<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient;
use Illuminate\Support\Facades\DB;
class PatientController extends Controller
{
    //
    function patientList()
    {
        $patients=patient::all();
        $patientCount=DB::table('patients')
        ->count();
        return view('admin.patient',['patients'=>$patients,'patientCount'=>$patientCount]);
    }
}
