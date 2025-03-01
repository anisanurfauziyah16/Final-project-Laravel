<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register() {
        return view('register');
    }
    public function welcome(Request $request) { 
        $Firstname = $request->input('First_name');
        $Lastname = $request->input('Last_name');

       
        return view('welcome', ["First_name" => $Firstname, "Last_name" => $Lastname]);

}
}
