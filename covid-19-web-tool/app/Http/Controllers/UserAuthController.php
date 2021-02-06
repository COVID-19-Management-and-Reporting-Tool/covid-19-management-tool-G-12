<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user;
use Illuminate\Support\Facades\Hash;



class UserAuthController extends Controller

{
    //
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }
    function create(Request $request){
        $request-> validate([
            'firstname' => 'required',
            'secondname' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users',
            'password'=> 'required|min:5|max:12'
        ]);

        //if form is validated successfully then register new user
        $user = new user;
        $user->firstname=$request->firstname;
        $user->lastname=$request->secondname;
        $user->dob=$request->dob;
        $user->gender=$request->gender;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $query = $user->save();
        if($query)
        {
            return back()->with('success','yello success');
        }
        else{
            return back()->with('fail','something went wrong ');
        }

    }


   function check (Request $request)
    {
        //validate requested inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        //if form validated
        $user =user::where('email','=',$request->email)->first();
        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                //if passwords match then redirect user to index page
                $request->session()->put('LoggedUser',$user->id);
                return redirect('index');
                

            }
            else{
                return back()->with('fail','invalid password');
            }

        }
        else
        {
            return back()->with('fail','no matching email please try again');
        }
    }
    function index()
    {
        if(session()->has('LoggedUser')){
            $user= user::where('id','=',session('LoggedUser'))->first();
            $data =[
                'LoggedUserInfo'=>$user
            ];
        }
        return view('admin.index',$data);
    }

    function logout()
    {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
}
