<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view("register.index",[
            'title' => 'Register',
            'active'=> 'register',
        ]);
    }
    
    
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required','min:4','max:20','unique:users' ],
            'email' => 'required|email:dns|unique:users',
            'password'=> ['required','min:5','max:255'],
        ]);

        User::create($validatedData);
        $request = session();
        $request->flash('success', 'Registrasi Berhasil! silahkan login');
        return redirect('/login');
        // atau 
        // return redirect('/login')->with('success', 'Registration successfull! Please login');


        // $request->session()->flash('success', 'Registrasi berhasil! Silahkan login');
        
    }
    
}
