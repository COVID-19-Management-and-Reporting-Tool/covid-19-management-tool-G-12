<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AddPayment extends Controller
{
    //
   
   

    function pay()
    {
        $startdate=Carbon::now();
        $paydate=$startdate->addDays(30);
        
        
        

        if($startdate->eq($paydate))
        {
        $sum=DB::table('donations')
            ->whereYear('created_at','2021')
            ->whereMonth('created_at','02')
            ->sum('amount');
            if($sum>10000)
            {
                DB::table('officers')
                ->orderby('id')
                ->chunkById(100,function($officers)
                {
                    foreach($officers as $officer)
                    {
                        DB::table('payments')
                        ->insert(['name'=>$officer->name,'salary_paid'=>$officer->salary,'status'=>'paid']);
                    }
                });
            }

        }
        $payments =payment::all();
       return view('admin.payment',['payments'=>$payments]);
        
        
    }
}
