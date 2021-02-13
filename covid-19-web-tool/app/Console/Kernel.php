<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

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
        // $schedule->command('inspire')->hourly();
        $schedule->call(function(){
            $sum=DB::table('donations')
            ->whereYear('created_at','2021')
            ->whereMonth('created_at','02')
            ->sum('amount');
            if($sum>=100000000)
            {
                DB::table('officers')
                ->orderby('id')
                ->chunkById(100,function($officers)
                {
                    foreach($officers as $officer)
                    {
                        $directorS=5000000;
                        $superintS=0.5*$directorS;
                        $adminS=0.75*$superintS;
                        $officerS=1.6*$adminS;
                        $seniorS=1.06*$officerS;
                        $headS=1.035*$officerS;
                        $consultS=0.7*$directorS;

                        if($officer->title=='headofficer')
                        {
                        DB::table('payments')
        
                        ->insert(['name'=>$officer->name,'salary_paid'=>$headS,'status'=>'paid']);
                        }
                        else if($officer->title=='director')
                        {
                            DB::table('payments')
        
                            ->insert(['name'=>$officer->name,'salary_paid'=>$directorS,'status'=>'paid']);

                        }
                        else if($officer->title=='superintendant')
                        {
                            DB::table('payments')
        
                            ->insert(['name'=>$officer->name,'salary_paid'=>$superintS,'status'=>'paid']);
                        }
                        else if($officer->title=='healthofficer')
                        {
                            DB::table('payments')
        
                            ->insert(['name'=>$officer->name,'salary_paid'=>$officerS,'status'=>'paid']);
                        }
                        else if($officer->title=='seniorofficer')
                        {
                            DB::table('payments')        
                            ->insert(['name'=>$officer->name,'salary_paid'=>$seniorS,'status'=>'paid']);
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
 
                     if($hospOne<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>1,'salary'=>3180000]);
 
                     }
                     else if($hospTwo<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>2,'salary'=>3180000]);
 
                     }
                     else if($hospThree<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>3,'salary'=>3180000]);
 
                     }
                     else if($hospFour<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>4,'salary'=>3180000]);
 
                     }
                     else if($hospFive<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>5,'salary'=>3180000]);
 
                     }
                     else if($hospSix<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>6,'salary'=>3180000]);
                     }
 
                     else if($hospSeven<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>7,'salary'=>3180000]);
                     }
                     else if($hospEight<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>8,'salary'=>3180000]);
                     }
                     else if($hospNine<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>9,'salary'=>3180000]);
                     }
                     else if($hospTen<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>10,'salary'=>3180000]);
                     }
                     else if($hospEleven<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>11,'salary'=>3180000]);
                     }
                     else if($hospTwelve<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>12,'salary'=>3180000]);
                     }
                     else if($hospThirt<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>13,'salary'=>3180000]);
                     }
                     else if($hospFourt<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>14,'salary'=>3180000]);
                     }
                     else if($hospFift<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>15,'salary'=>3180000]);
                     }
                     else if($hospSixt<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>16,'salary'=>3180000]);
                     }
                     else if($hospSevent<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>17,'salary'=>3180000]);
                     }
                     else if($hospEigt<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>18,'salary'=>3180000]);
                     }
                     else if($hospNinet<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>19,'salary'=>3180000]);
 
                     }
                     else if($hosptwent<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>20,'salary'=>3180000]);
                     }
                     else if($hospTwent0ne<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>21,'salary'=>3180000]);
                     }
                     else if($hospTwentTwo<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>22,'salary'=>3180000]);
                     }
                     else if($hospTwentThree<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>23,'salary'=>3180000]);
                     }
                     else if($hospTwentFour<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>24,'salary'=>3180000]);
                     }
                     else if($hospTwentFive<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>25,'salary'=>3180000]);
                     }
                     else if($hospTwentSix<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>26,'salary'=>3180000]);
                     }
                     else if($hospTwentSeven==100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>27,'salary'=>3180000]);
                     }
                     else if($hospTwentEight<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>28,'salary'=>3180000]);
                     }
                     else if($hospTwentNine<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>29,'salary'=>3180000]);
                     }
                     else if($hospThirty<=100)
                     {
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>30,'salary'=>3180000]);
                     }
                     else{
                         DB::table('officers')
                         ->where('name',$officer->name)
                         ->update(['category'=>'regional','title'=>'senior','hospital'=>1,'salary'=>3180000]);
 
 
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
                    $randomNatonalHosp=rand(51,155);
                    DB::table('officers')
                    ->where('name',$officer->name)
                    ->update(['category'=>'national','title'=>'consultant','award'=>10000000,'hospital'=>$randomNatonalHosp,'salary'=>3500000]);
                }
            }
        });

        //bonuses for each officer
        $sumD=DB::table('donations')
        ->whereYear('created_at','2021')
        ->whereMonth('created_at','02')
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
$donationTotal=DB::table('donations')
->whereMonth('created_at','02')
->sum('amount');

$TotalSalary=DB::table('officers')
->sum('salary');
$Remainder=$donationTotal-$TotalSalary;
$director=0.05*$Remainder;
$superin=0.5*$director;
$admin=0.75* $superin;
$covido=1.6*$admin;
$senCovido=1.06*$covido;
$headCovido=1.035*$covido;





   
                    if($officer->title=='headofficer')
                    {
                    DB::table('bonuses')
    
                    ->insert(['name'=>$officer->name,'amount'=>100]);
                    }
                    else if($officer->title=='director')
                    {
                        DB::table('bonuses')
    
                        ->insert(['name'=>$officer->name,'amount'=>70]);

                    }
                    else if($officer->title=='superintendant')
                    {
                        DB::table('bonuses')
    
                        ->insert(['name'=>$officer->name,'amount'=>300]);
                    }
                    else if($officer->title=='healthofficer')
                    {
                        DB::table('bonuses')
    
                        ->insert(['name'=>$officer->name,'amount'=>$headCovido]);
                    }
                    else if($officer->title=='seniorofficer')
                    {
                        DB::table('bonuses')        
                        ->insert(['name'=>$officer->name,'amount'=>80]);
                    }
                   


                }
            });
        }

        
        

       


        
        
        })->Monthly();
        
        
           
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
