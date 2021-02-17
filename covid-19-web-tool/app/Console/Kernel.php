<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
    //payment for each officer
        $schedule->call(function(){


            $Pyear=Carbon::now()->format('Y');
            $Pmonth=Carbon::now()->format('m');
            
            
            $sum=DB::table('donations')
            ->whereYear('created_at',$Pyear)
            ->whereMonth('created_at',$Pmonth)
            ->sum('amount');
            if($sum>=100000000)
            {
                DB::table('officers')
                ->orderby('id')
                ->chunkById(100,function($officers)
                {
                    foreach($officers as $officer)
                    {


                        


                        if($officer->title=='headofficer')
                        {
                        DB::table('payments')
        
                        ->insert(['name'=>$officer->name,'salary_paid'=>$officer->salary,'status'=>'paid']);
                        }
                        else if($officer->title=='director')
                        {
                            DB::table('payments')
        
                            ->insert(['name'=>$officer->name,'salary_paid'=>$officer->salary,'status'=>'paid']);

                        }
                        else if($officer->title=='superintendant')
                        {
                            DB::table('payments')
        
                            ->insert(['name'=>$officer->name,'salary_paid'=>$officer->salary,'status'=>'paid']);
                        }
                        else if($officer->title=='healthofficer')
                        {
                            DB::table('payments')
        
                            ->insert(['name'=>$officer->name,'salary_paid'=>$officer->salary,'status'=>'paid']);
                        }
                        else if($officer->title=='seniorofficer')
                        {
                            DB::table('payments')        
                            ->insert(['name'=>$officer->name,'salary_paid'=>$officer->salary,'status'=>'paid']);
                        }
                        else if($officer->title=='consultant')
                        {
                            DB::table('payments')        
                            ->insert(['name'=>$officer->name,'salary_paid'=>$officer->salary,'status'=>'paid']);
                        }
                       
                       


                    }
                });
            }
            

         //promote  from general category to senior hospital
         DB::table('officers')
         ->where('category','general')
         ->orderby('id')
         ->chunkById(100,function($officers){
             foreach($officers as $officer)
             {
                 $count=DB::table('patients')
                 ->where('officer_name',$officer->name)
                 ->count();
                 if($count >=100)
                 {
                     //count of officers foreach regional hospital
                     $hospOne=DB::table('officers')
                     ->where('hospital',1)
                     ->count();
                     $hospTwo=DB::table('officers')
                     ->where('hospital',2)
                     ->count();
                     $hospThree=DB::table('officers')
                     ->where('hospital',3)
                     ->count();
                     $hospFour=DB::table('officers')
                     ->where('hospital',4)
                     ->count();
                     $hospFive=DB::table('officers')
                     ->where('hospital',5)
                     ->count();
                     $hospSix=DB::table('officers')
                     ->where('hospital',6)
                     ->count();
 
                     $hospSeven=DB::table('officers')
                     ->where('hospital',7)
                     ->count();
                     $hospEight=DB::table('officers')
                     ->where('hospital',8)
                     ->count();
                     $hospNine=DB::table('officers')
                     ->where('hospital',9)
                     ->count();
                     $hospTen=DB::table('officers')
                     ->where('hospital',10)
                     ->count();
                     $hospEleven=DB::table('officers')
                     ->where('hospital',11)
                     ->count();
                     $hospTwelve=DB::table('officers')
                     ->where('hospital',12)
                     ->count();
 
                     $hospThirt=DB::table('officers')
                     ->where('hospital',13)
                     ->count();
                     $hospFourt=DB::table('officers')
                     ->where('hospital',14)
                     ->count();
                     $hospFift=DB::table('officers')
                     ->where('hospital',15)
                     ->count();
                     $hospSixt=DB::table('officers')
                     ->where('hospital',16)
                     ->count();
                     $hospSevent=DB::table('officers')
                     ->where('hospital',17)
                     ->count();
                     $hospEigt=DB::table('officers')
                     ->where('hospital',18)
                     ->count();
 
                     $hospNinet=DB::table('officers')
                     ->where('hospital',19)
                     ->count();
                     $hosptwent=DB::table('officers')
                     ->where('hospital',20)
                     ->count();
                     $hospTwent0ne=DB::table('officers')
                     ->where('hospital',21)
                     ->count();
                     $hospTwentTwo=DB::table('officers')
                     ->where('hospital',22)
                     ->count();
                     $hospTwentThree=DB::table('officers')
                     ->where('hospital',23)
                     ->count();
                     $hospTwentFour=DB::table('officers')
                     ->where('hospital',24)
                     ->count();
 
                     $hospTwentFive=DB::table('officers')
                     ->where('hospital',25)
                     ->count();
                     $hospTwentSix=DB::table('officers')
                     ->where('hospital',26)
                     ->count();
                     $hospTwentSeven=DB::table('officers')
                     ->where('hospital',27)
                     ->count();
                     $hospTwentEight=DB::table('officers')
                     ->where('hospital',28)
                     ->count();
                     $hospTwentNine=DB::table('officers')
                     ->where('hospital',29)
                     ->count();
                     $hospThirty=DB::table('officers')
                     ->where('hospital',30)
                     ->count();
                     //salaries structure
                     $director=5000000;
                     $superintendant=0.5 * $director;
                     $healthofficer=1.6 *(0.75* $superintendant);
                     $seniorOfficer=1.06 * $healthofficer;
                     $headofficer=1.035 *$healthofficer;
 
                     if($hospOne<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>1,'salary'=>$seniorOfficer]);
 
                     }
                     else if($hospTwo<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>2,'salary'=>$seniorOfficer]);
 
                     }
                     else if($hospThree<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>3,'salary'=>$seniorOfficer]);
 
                     }
                     else if($hospFour<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>4,'salary'=>$seniorOfficer]);
 
                     }
                     else if($hospFive<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>5,'salary'=>$seniorOfficer]);
 
                     }
                     else if($hospSix<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>6,'salary'=>$seniorOfficer]);
                     }
 
                     else if($hospSeven<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>7,'salary'=>$seniorOfficer]);
                     }
                     else if($hospEight<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>8,'salary'=>$seniorOfficer]);
                     }
                     else if($hospNine<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>9,'salary'=>$seniorOfficer]);
                     }
                     else if($hospTen<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>10,'salary'=>$seniorOfficer]);
                     }
                     else if($hospEleven<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>11,'salary'=>$seniorOfficer]);
                     }
                     else if($hospTwelve<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>12,'salary'=>$seniorOfficer]);
                     }
                     else if($hospThirt<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>13,'salary'=>$seniorOfficer]);
                     }
                     else if($hospFourt<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>14,'salary'=>$seniorOfficer]);
                     }
                     else if($hospFift<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>15,'salary'=>$seniorOfficer]);
                     }
                     else if($hospSixt<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>16,'salary'=>$seniorOfficer]);
                     }
                     else if($hospSevent<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>17,'salary'=>$seniorOfficer]);
                     }
                     else if($hospEigt<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>18,'salary'=>$seniorOfficer]);
                     }
                     else if($hospNinet<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>19,'salary'=>$seniorOfficer]);
 
                     }
                     else if($hosptwent<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>20,'salary'=>$seniorOfficer]);
                     }
                     else if($hospTwent0ne<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>21,'salary'=>$seniorOfficer]);
                     }
                     else if($hospTwentTwo<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>22,'salary'=>$seniorOfficer]);
                     }
                     else if($hospTwentThree<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>23,'salary'=>$seniorOfficer]);
                     }
                     else if($hospTwentFour<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>24,'salary'=>$seniorOfficer]);
                     }
                     else if($hospTwentFive<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>25,'salary'=>$seniorOfficer]);
                     }
                     else if($hospTwentSix<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>26,'salary'=>$seniorOfficer]);
                     }
                     else if($hospTwentSeven==100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>27,'salary'=>$seniorOfficer]);
                     }
                     else if($hospTwentEight<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>28,'salary'=>$seniorOfficer]);
                     }
                     else if($hospTwentNine<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>29,'salary'=>$seniorOfficer]);
                     }
                     else if($hospThirty<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>30,'salary'=>$seniorOfficer]);
                     }
                     else{
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>1,'salary'=>$seniorOfficer]);
 
 
                     }
 
  
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
                if($count >=900)
                {
                    $directorS=5000000;
                    $superintendantS=0.5 * $director;
                    $healthofficerS=1.6 *(0.75* $superintendant);
                    $seniorOfficerS=1.06 * $healthofficer;
                    $headofficerS=1.035 *$healthofficer;
                    $consultantS=0.7 * $director;
                    $randomNatonalHosp=rand(51,155);
                    DB::table('officers')
                    ->where('name',$officer->name)
                    ->update(['category'=>'national','title'=>'consultant','award'=>10000000,'hospital'=>$randomNatonalHosp,'salary'=>$consultant]);
                }
            }
        });

        //bonuses for each officer
        $Byear=Carbon::now()->format('Y');
        $Bmonth=Carbon::now()->format('m');
        $sumD=DB::table('donations')
        ->whereYear('created_at',$Byear)
        ->whereMonth('created_at',$Bmonth)
        ->sum('amount');
        if($sumD>=100000000)
        {
         
    
            DB::table('officers')
            ->orderby('id')
            ->chunkById(100,function($officers)
            {
                foreach($officers as $officer)
                {
                    //monthly bounuses per title
$doMonth=Carbon::now()->format('m');
$donationTotal=DB::table('donations')
->whereMonth('created_at',$doMonth)
->sum('amount');

$TotalSalary=DB::table('officers')
->sum('salary');
$Remainder=$donationTotal-$TotalSalary;
$directorB=0.05*$Remainder;
$superinB=0.5*$directorB;
$admin=0.75* $superinB;
$covidoB=1.6*$admin;
$senCovidoB=1.06*$covidoB;
$headCovidoB=1.035*$covidoB;
$consultantB=0.7 * $directorB;





   
                    if($officer->title=='headofficer')
                    {
                    DB::table('bonuses')
    
                    ->insert(['name'=>$officer->name,'amount'=>$headCovidoB]);
                    }
                    else if($officer->title=='director')
                    {
                        DB::table('bonuses')
    
                        ->insert(['name'=>$officer->name,'amount'=>$directorB]);

                    }
                    else if($officer->title=='superintendant')
                    {
                        DB::table('bonuses')
    
                        ->insert(['name'=>$officer->name,'amount'=>$superinB]);
                    }
                    else if($officer->title=='healthofficer')
                    {
                        DB::table('bonuses')
    
                        ->insert(['name'=>$officer->name,'amount'=>$covidoB]);
                    }
                    else if($officer->title=='seniorofficer')
                    {
                        DB::table('bonuses')        
                        ->insert(['name'=>$officer->name,'amount'=>$seniorCovidoB]);
                    }
                    else if($officer->title=='consultant')
                    {
                        DB::table('bonuses')        
                        ->insert(['name'=>$officer->name,'amount'=>$consultantB]);
                    }

                   


                }
            });
        }

        
        

       


        
        
        })->EveryMinute();
        
           
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
