<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;

class SantoDoDiaController extends Controller
{
    public function getTitleSaintOfDay(){
        $crawler = Goutte::request('GET', 'https://santo.cancaonova.com/');
        $crawler->filter('.content-header .entry-title')->each(function ($node) {
            dump($node->text());
        });
        return print($crawler);
    }
}
