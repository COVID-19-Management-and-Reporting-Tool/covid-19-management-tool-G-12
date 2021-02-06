<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    //
    function counts()
    {
        $jan=DB::table('donations')
        ->whereMonth('created_at','01')
        ->count();
        $feb=DB::table('donations')
        ->whereMonth('created_at','02')
        ->count();
        $mar=DB::table('donations')
        ->whereMonth('created_at','03')
        ->count();
        $apr=DB::table('donations')
        ->whereMonth('created_at','04')
        ->count();
        $may=DB::table('donations')
        ->whereMonth('created_at','05')
        ->count();
        $jun=DB::table('donations')
        ->whereMonth('created_at','06')
        ->count();
        $jul=DB::table('donations')
        ->whereMonth('created_at','07')
        ->count();
        $aug=DB::table('donations')
        ->whereMonth('created_at','08')
        ->count();
        $sep=DB::table('donations')
        ->whereMonth('created_at','09')
        ->count();
        $oct=DB::table('donations')
        ->whereMonth('created_at','10')
        ->count();
        $nov=DB::table('donations')
        ->whereMonth('created_at','11')
        ->count();
        $dec=DB::table('donations')
        ->whereMonth('created_at','12')
        ->count();
        
        $cases=DB::table('patients')
        ->count();
        $workers=DB::table('officers')
        ->count();

        //for enrollment
        $ojan=DB::table('officers')
        ->whereMonth('created_at','01')
        ->count();
        $ofeb=DB::table('officers')
        ->whereMonth('created_at','02')
        ->count();
        $omar=DB::table('officers')
        ->whereMonth('created_at','03')
        ->count();
        $oapr=DB::table('officers')
        ->whereMonth('created_at','04')
        ->count();
        $omay=DB::table('officers')
        ->whereMonth('created_at','05')
        ->count();
        $ojun=DB::table('officers')
        ->whereMonth('created_at','06')
        ->count();
        $ojul=DB::table('officers')
        ->whereMonth('created_at','07')
        ->count();
        $oaug=DB::table('officers')
        ->whereMonth('created_at','08')
        ->count();
        $osep=DB::table('officers')
        ->whereMonth('created_at','09')
        ->count();
        $ooct=DB::table('officers')
        ->whereMonth('created_at','10')
        ->count();
        $onov=DB::table('officers')
        ->whereMonth('created_at','11')
        ->count();
        $odec=DB::table('officers')
        ->whereMonth('created_at','12')
        ->count();
        $total=db::table('officers')->count();
        //promote to senior hospital
        DB::table('officers')
        ->where('category','general')
        ->orderby('id')
        ->chunkById(100,function($officers){
            foreach($officers as $officer)
            {
                $count=DB::table('patients')
                ->where('officer_name',$officer->name)
                ->count();
                if($count <=15)
                {
                    DB::table('officers')
                    ->where('name',$officer->name)
                    ->update(['category'=>'regional','title'=>'senior']);
                }
            }
        });
        //promote to national hospital
        DB::table('officers')
        ->where('category','regional')
        ->orderby('id')
        ->chunkById(100,function($officers){
            foreach($officers as $officer)
            {
                $count=DB::table('patients')
                ->where('officer_name',$officer->name)
                ->count();
                if($count <=100)
                {
                    DB::table('officers')
                    ->where('name',$officer->name)
                    ->update(['category'=>'national','title'=>'consultant']);
                }
            }
        });
        return view('admin.index',['jan'=>$jan,'feb'=>$feb,'mar'=>$mar,'apr'=>$apr,'may'=>$may,'jun'=>$jun,'jul'=>$jul,'aug'=>$aug,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,'dec'=>$dec,'cases'=>$cases,'workers'=>$workers,'ojan'=>$ojan,'ofeb'=>$ofeb,'omar'=>$omar,'oapr'=>$oapr,'omay'=>$omay,'ojun'=>$ojun,'ojul'=>$ojul,'oaug'=>$oaug,'osep'=>$osep,'ooct'=>$ooct,'onov'=>$onov,'odec'=>$odec,'total'=>$total]);

    }

    
    
}
