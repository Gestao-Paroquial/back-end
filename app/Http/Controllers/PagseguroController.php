<?php

namespace App\Http\Controllers;
use PagSeguro;

use App\Note;
use Illuminate\Http\Request;

class PagseguroController extends Controller
{
    public function index()
    {
        $data = [
            'items' => [
                [
                    'id' => 20,
                    'description' => 'Casamento',
                    'quantity' => 1,
                    'amount' => 100.5
                ]
            ],
            'sender' => [
                'name' => 'Isaque de Souza Barbosa',
                'documents' => [
                    [
                        'number' => '40404040411',
                        'type' => 'CPF'
                    ]
                ],
                'phone' => '11985445522',
                'bornDate' => '1988-03-21',
            ],
            'currency' => 'BRL',
            'cellphone_charger' => '+5511980840022'
        ];

   

        $checkout = PagSeguro::checkout()->createFromArray($data);
        $credentials = PagSeguro::credentials()->get();
        $information = $checkout->send($credentials); // Retorna um objeto de laravel\pagseguro\Checkout\Information\Information
        if ($information) {
            print_r($information->getCode());
            print_r($information->getDate());
            print_r($information->getLink());
        }
    }
}
