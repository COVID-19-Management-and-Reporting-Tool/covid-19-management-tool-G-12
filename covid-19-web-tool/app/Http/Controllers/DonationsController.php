<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donation;
use Illuminate\Support\Facades\DB;

class DonationsController extends Controller
{
    //
    function getDonations(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'amount' => 'required',
            
        ]);
        $donation=new donation;
        $donation->name=$req->name;
        $donation->amount=$req->amount;
        
        $query = $donation->save();
        return redirect("/donations");
    }

    function donationList()
    {
        $donations= donation::all();
        return view('admin.donations',['donations'=>$donations]);
    }
    

   
}
