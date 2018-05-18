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
            } else {
                $pedido = Pedido::findOrFail($id);
                $pedido->code = $code;
                $pedido->save();
            }           

            
        } catch (Exception $error) { // Caso ocorreu algum erro
            echo $error->getMessage(); // Exibe na tela a mensagem de erro
        }
    }
}
