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
        $hospThirtyOne=DB::table('officers')
        ->where('hospital','31')
        ->count();
        $hospThirtyTwo=DB::table('officers')
        ->where('hospital','32')
        ->count();
        $hospThirtyThree=DB::table('officers')
        ->where('hospital','33')
        ->count();
        $hospThirtyFour=DB::table('officers')
        ->where('hospital','34')
        ->count();
        $hospThirtyFive=DB::table('officers')
        ->where('hospital','35')
        ->count();
        $hospThirtySix=DB::table('officers')
        ->where('hospital','36')
        ->count();
        $hospThirtySeven=DB::table('officers')
        ->where('hospital','37')
        ->count();
        $hospThirtyEight=DB::table('officers')
        ->where('hospital','38')
        ->count();
        $hospThirtyNine=DB::table('officers')
        ->where('hospital','39')
        ->count();
        $hospFourty=DB::table('officers')
        ->where('hospital','40')
        ->count();
        $hospFourtyOne=DB::table('officers')
        ->where('hospital','41')
        ->count();
        $hospFourtyTwo=DB::table('officers')
        ->where('hospital','42')
        ->count();
        $hospFourtyThree=DB::table('officers')
        ->where('hospital','43')
        ->count();
        $hospFourtyFour=DB::table('officers')
        ->where('hospital','44')
        ->count();
        $hospFourtyFive=DB::table('officers')
        ->where('hospital','45')
        ->count();
        $hospFourtySix=DB::table('officers')
        ->where('hospital','46')
        ->count();
        $hospFourtySeven=DB::table('officers')
        ->where('hospital','47')
        ->count();
        $hospFourtyEight=DB::table('officers')
        ->where('hospital','48')
        ->count();
        $hospFourtyNine=DB::table('officers')
        ->where('hospital','49')
        ->count();
        $hospFifty=DB::table('officers')
        ->where('hospital','50')
        ->count();
        //salary structure
                     $director=5000000;
                     $superintendant=0.5 * $director;
                     $healthofficer=1.6 *(0.75* $superintendant);
                     $seniorOfficer=1.06 * $healthofficer;
                     $headofficer=1.035 *$healthofficer;

        if($hospThirtyOne<=15)
        {

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="healthofficer";
        $officer->hospital="31";
        $officer->salary=$healthofficer;
        $officer->category="general";
        $query = $officer->save();
        }
       else if($hospThirtyTwo<=15)
        {

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="healthofficer";
        $officer->hospital="32";
        $officer->salary=$healthofficer;
        $officer->category="general";
        $query = $officer->save();
        }
        else if($hospThirtyThree<=15)
        {

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="healthofficer";
        $officer->hospital="33";
        $officer->salary=$healthofficer;
        $officer->category="general";
        $query = $officer->save();
        }
       else if($hospThirtyFour<=15)
        {

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="healthofficer";
        $officer->hospital="34";
        $officer->salary=$healthofficer;
        $officer->category="general";
        $query = $officer->save();
        }
       else if($hospThirtyFive<=15)
        {

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="healthofficer";
        $officer->hospital="35";
        $officer->salary=$healthofficer;
        $officer->category="general";
        $query = $officer->save();
        }
       else if($hospThirtySix<=15)
        {

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="healthofficer";
        $officer->hospital="36";
        $officer->salary=$healthofficer;
        $officer->category="general";
        $query = $officer->save();
        }
        else if ($hospThirtySeven<=15){

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="healthofficer";
        $officer->hospital="37";
        $officer->salary=$healthofficer;
        $officer->category="general";
        $query = $officer->save();

        }

        else if ($hospThirtyEight<=15){

            $officer=new officer;
            $officer->name=$request->fullname;
            $officer->title="healthofficer";
            $officer->hospital="38";
            $officer->salary=$healthofficer;
            $officer->category="general";
            $query = $officer->save();
    
            }
            else if ($hospThirtyNine<=15){

                $officer=new officer;
                $officer->name=$request->fullname;
                $officer->title="healthofficer";
                $officer->hospital="39";
                $officer->salary=$healthofficer;
                $officer->category="general";
                $query = $officer->save();
        
                }

                else if ($hospFourty<=15){

                    $officer=new officer;
                    $officer->name=$request->fullname;
                    $officer->title="healthofficer";
                    $officer->hospital="40";
                    $officer->salary=$healthofficer;
                    $officer->category="general";
                    $query = $officer->save();
            
                    }
                    else if ($hospFourtyOne<=15){

                        $officer=new officer;
                        $officer->name=$request->fullname;
                        $officer->title="healthofficer";
                        $officer->hospital="41";
                        $officer->salary=$healthofficer;
                        $officer->category="general";
                        $query = $officer->save();
                
                        } 
                        else if ($hospFourtyTwo<=15){

                            $officer=new officer;
                            $officer->name=$request->fullname;
                            $officer->title="healthofficer";
                            $officer->hospital="42";
                            $officer->salary=$healthofficer;
                            $officer->category="general";
                            $query = $officer->save();
                    
                            }
else if ($hospFourtyThree<=15){

$officer=new officer;
$officer->name=$request->fullname;
$officer->title="healthofficer";
$officer->hospital="43";
$officer->salary=$healthofficer;
$officer->category="general";
$query = $officer->save();

}
else if ($hospFourtyFour<=15){

    $officer=new officer;
    $officer->name=$request->fullname;
    $officer->title="healthofficer";
    $officer->hospital="44";
    $officer->salary=$healthofficer;
    $officer->category="general";
    $query = $officer->save();

    }
    else if ($hospFourtyFive<=15){

        $officer=new officer;
        $officer->name=$request->fullname;
        $officer->title="healthofficer";
        $officer->hospital="45";
        $officer->salary=$healthofficer;
        $officer->category="general";
        $query = $officer->save();

        }

        else if ($hospFourtySix<=15){

            $officer=new officer;
            $officer->name=$request->fullname;
            $officer->title="healthofficer";
            $officer->hospital="46";
            $officer->salary=$healthofficer;
            $officer->category="general";
            $query = $officer->save();
    
            }
            else if ($hospFourtySeven<=15){

                $officer=new officer;
                $officer->name=$request->fullname;
                $officer->title="healthofficer";
                $officer->hospital="47";
                $officer->salary=$healthofficer;
                $officer->category="general";
                $query = $officer->save();
        
                }
                else if ($hospFourtyEight=15){

                    $officer=new officer;
                    $officer->name=$request->fullname;
                    $officer->title="healthofficer";
                    $officer->hospital="48";
                    $officer->salary=$healthofficer;
                    $officer->category="general";
                    $query = $officer->save();
            
                    }
                    else if ($hospFourtyNine<=15){

                        $officer=new officer;
                        $officer->name=$request->fullname;
                        $officer->title="healthofficer";
                        $officer->hospital="49";
                        $officer->salary=$healthofficer;
                        $officer->category="general";
                        $query = $officer->save();
                
                        }
        else if ($hospFifty<=15){

            $officer=new officer;
            $officer->name=$request->fullname;
            $officer->title="healthofficer";
            $officer->hospital="50";
            $officer->salary=$healthofficer;
            $officer->category="general";
            $query = $officer->save();
    
            } 
            else{
                $officer=new officer;
                $officer->name=$request->fullname;
                $officer->title="healthofficer";
                $officer->hospital="31";
                $officer->salary=$healthofficer;
                $officer->category="general";
                $query = $officer->save();


            }


        
        return redirect('/healthofficer');
    
    }

    function Rank(Request $req)
    {
    

        $req->validate([
            'Title'=>'required',
            'name'=>'required'
    
            
        ]);

        $head =officer::where('name',$req->name)->first();
                    $director=5000000;
                     $superintendant=0.5 * $director;
                     $healthofficer=1.6 *(0.75* $superintendant);
                     $seniorOfficer=1.06 * $healthofficer;
                     $headofficer=1.035 *$healthofficer;
                     $consultant=0.7 * $director;

        if($head)
        {
            if($req->Title=='headofficer')
            {
                DB::table('officers')
                ->where('name',$req->name)
                ->update(['title'=>$req->Title,'salary'=>$headofficer]);
                return back()->with('success','officer has been made a headofficer');
        

            }

            if($req->Title=='director')
            {
                DB::table('officers')
                ->where('name',$req->name)
                ->update(['title'=>$req->Title,'salary'=>$director]);
                return back()->with('success','officer has been made a director');
        

            }
            if($req->Title=='superintendant')
            {
                DB::table('officers')
                ->where('name',$req->name)
                ->update(['title'=>$req->Title,'salary'=>$superintendant]);
                return back()->with('success','officer has been made a superintendant');
        
            }
            

       
        }
        else{
            return back()->with('fail','the officer doesnot exist in system');
        }


    }
    function workerList()
    {
        $workers= officer::all();
        return view('admin.healthofficer',['workers'=>$workers]);

    }

    
}
