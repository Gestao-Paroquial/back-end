<?php
namespace App\Http\Services;

use PHPSC\PagSeguro\Credentials;
use PHPSC\PagSeguro\Environments\Production;
use PHPSC\PagSeguro\Environments\Sandbox;
use PHPSC\PagSeguro\Customer\Customer;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use DateTime;
use PHPSC\PagSeguro\Requests\PreApprovals\Period;
use PHPSC\PagSeguro\Requests\PreApprovals\PreApprovalService;
use PHPSC\PagSeguro\Purchases\Subscriptions\Locator as SubscriptionLocator;
use PHPSC\PagSeguro\Purchases\Transactions\Locator as TransactionLocator;
use App\Pedido;
use App\Doacoe;
use App\User;
use JWTAuth;
use Illuminate\Support\Facades\DB;


// /* Ambiente de produção: */

// $credentials = new Credentials('EMAIL CADASTRADO NO PAGSEGURO', 'TOKEN DE ACESSO À API');

// // ou 

// $credentials = new Credentials(
//     'EMAIL CADASTRADO NO PAGSEGURO', 
//     'TOKEN DE ACESSO À API',
//     new Production()
// );

/* Ambiente de testes: */

class PagSeguroService  
{        
    public function getCredentials()
    {
        $credentials = new Credentials(
            env('PAGSEGURO_EMAIL'), 
            env('PAGSEGURO_TOKEN'),
            new Sandbox()
        );

        return $credentials;
    }

    public  function checkout($id, $name, $value) 
    {
        try {
            $service = new CheckoutService($this->getCredentials()); // cria instância do serviço de pagamentos
            
            $checkout = $service->createCheckoutBuilder()
                                ->addItem(new Item($id, $name, $value))
                                ->getCheckout();
            
            $checkout->setNotificationURL( env('APP_URL')."/api/pagseguro/notificacao" );
            $response = $service->checkout($checkout);
        

            $link = $response->getRedirectionUrl();

            return $link;
            // header('Location: ' . $response->getRedirectionUrl()); // Redireciona o usuário
        } catch (Exception $error) { // Caso ocorreu algum erro
            echo $error->getMessage(); // Exibe na tela a mensagem de erro
        }

    }

    public  function assinatura()
    {
        try {
            $service = new PreApprovalService($this->getCredentials()); // cria instância do serviço de pagamentos
            
            $request = $service->createRequestBuilder(false)
                           ->setName('Nome da assinatura')
                           ->setPeriod(Period::MONTHLY)
                        //    ->setFinalDate(new DateTime('2020-12-31 23:59:59'))
                           ->setAmountPerPayment(10)
                           ->setMaxTotalAmount(50)
                           ->getRequest();
            
            $response = $service->approve($request);

            $service->setNotificationURL( "http://localhost:8000/api/notificacao" );
        
            print($response->getRedirectionUrl());
        } catch (Exception $error) { // Caso ocorreu algum erro
            echo $error->getMessage(); // Exibe na tela a mensagem de erro
        }
    }

    public function notificacao()
    {
        try {
            $service = $_POST['notificationType'] == 'preApproval'
                       ? new SubscriptionLocator($this->getCredentials())
                       : new TransactionLocator($this->getCredentials()); 
                       
            $purchase = $service->getByNotification($_POST['notificationCode']);
            $code = $purchase->getDetails()->getStatus();
            $item = $purchase->getItems()[0];
            $id = $item ->getId(); 
            $description = $item->getDescription();
            
            if ($description == Doacoe::DESCRICAO_PAGSEGURO) {
                $doacao = Doacoe::findOrFail($id);
                $doacao->code = $code;
                $doacao->save();
                if ($code == 4) {
                    $this->sendRequestToBillingCycle($doacao);
                }
            } else {
                $pedido = Pedido::findOrFail($id);
                $pedido->code = $code;
                $pedido->save();
            }           

            
        } catch (Exception $error) { // Caso ocorreu algum erro
            echo $error->getMessage(); // Exibe na tela a mensagem de erro
        }
    }

    private function sendRequestToBillingCycle($doacao){
        $query = '
        mutation AddToDonationGroup($donationGroup: String! ,$credit: DebtInput!) {
            addToDonationGroup(donationGroup: $donationGroup, credit: $credit) {
              id
            }
          }
        ';

        $meses = array(
            '01'=>'Janeiro',
            '02'=>'Fevereiro',
            '03'=>'Março',
            '04'=>'Abril',
            '05'=>'Maio',
            '06'=>'Junho',
            '07'=>'Julho',
            '08'=>'Agosto',
            '09'=>'Setembro',
            '10'=>'Outubro',
            '11'=>'Novembro',
            '12'=>'Dezembro'
        );        
    
        $credit = [
                "name" => "Doação efetuada em ".date("d-m-Y"),
                "value" => $doacao->valor,
                "donationId" => $doacao->id,
        ];

        $donationGroup = $meses[date('m')]. ' de '. date('Y');
        
        $variables = [
            'credit' =>  $credit,
            'donationGroup' => $donationGroup,
        ];
        
        $json = json_encode(['query' => $query, 'variables' => $variables]);

        $user = DB::table('users')->first();

        $token =  JWTAuth::attempt([
            "email" => $user->email,
            "password" => '1234',
            "is_verified" => 1
        ]);
        
        $chObj = curl_init();
        curl_setopt($chObj, CURLOPT_URL, env('GRAPHQL_SERVER'));
        curl_setopt($chObj, CURLOPT_RETURNTRANSFER, true);    
        curl_setopt($chObj, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($chObj, CURLOPT_HEADER, true);
        curl_setopt($chObj, CURLOPT_VERBOSE, true);
        curl_setopt($chObj, CURLOPT_POSTFIELDS, $json);
        curl_setopt($chObj, CURLOPT_HTTPHEADER,
             array(
                    'User-Agent: PHP Script',
                    'Content-Type: application/json;charset=utf-8',
                    'Authorization: Bearer '.$token
                )
            ); 
    
        $response = curl_exec($chObj);
    }
}
