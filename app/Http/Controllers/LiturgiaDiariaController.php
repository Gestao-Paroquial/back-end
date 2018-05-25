<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LiturgiaDiaria;
use Goutte;

class LiturgiaDiariaController extends Controller
{
    public function storeDailyLiturgy(){
        $crawler = Goutte::request('GET','https://liturgia.cancaonova.com/');
        $firstReading = $crawler->filter('.tab-content #liturgia-1')->each(function($node){
            return $node->text();
        });
        $secondReading = $crawler->filter('.tab-content #liturgia-3')->each(function($node){
            return $node->text();
        });
        $gospel = $crawler->filter('.tab-content #liturgia-4')->each(function($node){
            return $node->text();
        });
        $psalm = $crawler->filter('.tab-content #liturgia-2')->each(function($node){
            return $node->text();
        });
        $liturgicTime = $crawler->filter('.content-header .entry-title')->each(function($node){
            return $node->text();
        });
        $liturgicColor = $crawler->filter('.cor-liturgica')->each(function($node){
            return $node->text();
        });
        $day = $crawler->filter('.dia-liturgia .dia')->each(function($node){
            return $node->text();
        });
        $month = $crawler->filter('.mes-ano-liturgia .mes')->each(function($node){
            return $node->text();
        });
        $year = $crawler->filter('.mes-ano-liturgia .ano')->each(function($node){
            return $node->text();
        });       
        try {
            $strFirstReading = implode("",$firstReading);
            $strSecondReading = implode("",$secondReading);
            $strGospel = implode("",$gospel);
            $strPsalm = implode("",$psalm);
            $strLiturgicTime = implode("",$liturgicTime);
            $strLiturgicColor = implode("",$liturgicColor);
            $strDay = implode("",$day);
            $strMonth = implode("",$month);
            $strYear = implode("",$year);
            $dailyLiturgy = new LiturgiaDiaria();
            $dailyLiturgy->dia = $strDay;
            $dailyLiturgy->mes = $strMonth;
            $dailyLiturgy->ano = $strYear;
            $dailyLiturgy->primeira_leitura = $strFirstReading;
            $dailyLiturgy->segunda_leitura = $strSecondReading;
            $dailyLiturgy->salmo = $strPsalm;
            $dailyLiturgy->evangelho = $strGospel;
            $dailyLiturgy->cor_liturgica = $strLiturgicColor;
            $dailyLiturgy->tempo_liturgico = $strLiturgicTime;
            $dailyLiturgy->save();
            return response()->json(['message'=>'Liturgia adicionada com sucesso']);            
        } catch (Exception $e) {
            return response()-json(['erro ao adicionar liturgia'=>$e]);
        }                
    }
    public function showDailyLiturgyFiltered($year, $month, $day){
        $liturgy = new LiturgiaDiaria();
        $result = $liturgy
            ->where([
                ['ano','=',$year],
                ['mes','=',$month],
                ['dia','=',$day]
            ])->get();
        return $result;    
    }
}
