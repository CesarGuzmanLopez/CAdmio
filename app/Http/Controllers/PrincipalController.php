<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Gate;

class PrincipalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use AuthenticatesUsers;
    

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
    	return view('Principal')->with('title',"Cadmio");
    }
    public function Animate(){
  
        return view('JSmol.1');
        
    }
    public function cerrarSesion(){
        //Desconctamos al usuario
        \Auth::logout();
        
        return redirect('/');
        
    }
}