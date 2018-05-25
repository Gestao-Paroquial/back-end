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
        $file = array(
            'image' => 'http://img.cancaonova.com/cnimages/canais/uploads/sites/2/2013/02/beatos-francisco-e-jacinta.jpg'
        );
        $imageRequest = Goutte::request('POST','http://localhost:8000/api/uploadImagem',array(),$file); 
        $history = [];
        $request = end($history)['request'];       
        
        //$image = $crawler->selectImage('')->image();
        return print($request->getBody());
        /*$strTitle = implode("",$title);
        $strHistory = implode("",$history);
        $strDay = implode("",$day);
        $strMonth = implode("",$month);
        $santoDoDia = new SantoDoDia();
        $santoDoDia->nome = $strTitle;
        $santoDoDia->historia = $strHistory;
        $santoDoDia->dia = $strDay;
        $santoDoDia->mes = $strMonth;
        $santoDoDia->save();*/        
        //return response()->json(['Santo'=>$strTitle, 'História'=>$strHistory, 'Mês'=>$strMonth, 'Dia'=>$strDay]);
        
    }   
}
