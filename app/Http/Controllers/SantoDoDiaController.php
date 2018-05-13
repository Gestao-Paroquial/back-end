<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
use App\SantoDoDia; 

class SantoDoDiaController extends Controller
{
    public function storeSaintOfDay(){
        $crawler = Goutte::request('GET', 'https://santo.cancaonova.com/');
        $history = $crawler->filter('article p')->each(function ($node){             
            return $node->text();
        });
        $title = $crawler->filter('.content-header .entry-title')->each(function ($node) {            
            return $node->text();            
        }); 
        $day = $crawler->filter('.dia-liturgia .dia')->each(function ($node) {            
            return $node->text();            
        }); 
        $month = $crawler->filter('.content-header .mes')->each(function ($node) {            
            return $node->text();            
        });                
        $strTitle = implode("",$title);
        $strHistory = implode("",$history);
        $strDay = implode("",$day);
        $strMonth = implode("",$month);
        $santoDoDia = new SantoDoDia();
        $santoDoDia->nome = $strTitle;
        $santoDoDia->historia = $strHistory;
        $santoDoDia->dia = $strDay;
        $santoDoDia->mes = $strMonth;
        $santoDoDia->save();        
        return response()->json(['Santo'=>$strTitle, 'História'=>$strHistory, 'Mês'=>$strMonth, 'Dia'=>$strDay]);
    }
}
