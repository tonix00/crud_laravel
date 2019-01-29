<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginsController extends Controller
{
    public function getLoginPage()
    {
    	//make sure, a user is not login
    	Auth::logout();

    	// view login page
    	return view('/login');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }

    public function checkLogin(Request $request)
    {

    	$this->validate($request, [
    		'email'    =>'required',
    		'password' =>'required'
    	]);

    	$userData =  array(
    		'email'   =>  $request->email,
    		'password'=>  $request->password 
    	);

    	if(Auth::attempt($userData)){
    		return redirect('/');
    	}else{
    		return back()->with('error','Wrong login details.');
    	}
    }
}
