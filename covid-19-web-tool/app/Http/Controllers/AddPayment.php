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
        
        
        

       
        

        
        $payments =payment::all();
       return view('admin.payment',['payments'=>$payments]);
        
        
    }
}
