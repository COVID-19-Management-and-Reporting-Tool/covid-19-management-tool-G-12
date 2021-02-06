<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\officer;

class HealthOfficerController extends Controller
{
    function addOfficer(Request $request)
    {
        $request->validate([
            'fullname'=>'required',
            
        ]);
        $hospOne=DB::table('officers')
        ->where('hospital','1')
        ->count();
        $hospTwo=DB::table('officers')
        ->where('hospital','2')
        ->count();
        $hospThree=DB::table('officers')
        ->where('hospital','3')
        ->count();
        $hospFour=DB::table('officers')
        ->where('hospital','4')
        ->count();
        $hospFive=DB::table('officers')
        ->where('hospital','5')
        ->count();
        $hospSix=DB::table('officers')
        ->where('hospital','6')
        ->count();
        if($hospOne<=15)
        {

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="juniorofficer";
        $officer->hospital="1";
        $officer->salary=200000;
        $officer->category="general";
        $query = $officer->save();
        }
       else if($hospTwo<=15)
        {

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="juniorofficer";
        $officer->hospital="2";
        $officer->salary=200000;
        $officer->category="general";
        $query = $officer->save();
        }
        else if($hospThree<=15)
        {

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="juniorofficer";
        $officer->hospital="3";
        $officer->salary=200000;
        $officer->category="general";
        $query = $officer->save();
        }
       else if($hospFour<=15)
        {

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="juniorofficer";
        $officer->hospital="4";
        $officer->salary=200000;
        $officer->category="general";
        $query = $officer->save();
        }
       else if($hospFive<=15)
        {

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="juniorofficer";
        $officer->hospital="5";
        $officer->salary=200000;
        $officer->category="general";
        $query = $officer->save();
        }
       else if($hospSix<=15)
        {

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="juniorofficer";
        $officer->hospital="6";
        $officer->salary=200000;
        $officer->category="general";
        $query = $officer->save();
        }
        else{

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="juniorofficer";
        $officer->hospital="1";
        $officer->salary=200000;
        $officer->category="general";
        $query = $officer->save();

        }
        
        return redirect('/healthofficer');
    
    }
    function workerList()
    {
        $workers= officer::all();
        return view('admin.healthofficer',['workers'=>$workers]);

    }
}
