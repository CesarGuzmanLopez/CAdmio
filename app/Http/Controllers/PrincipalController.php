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
    public function Animate(Request $request){
        
        $width =100;
        $height=100;
        $color="#00000000";
        
        $smile="cc";
        if($request->has("width"))
            $width=$request->width;
        if($request->has("height"))
            $height=$request->height;
        if($request->has("color"))
            $color= str_replace("#", "", $request->color);
        if($request->has("smile")&&$request->smile!="_"&& !$request->has("isfile")  )
            $smile="$".$request->smile;
        else
            $smile=$request->smile ;    
        return view('JSmol.1')->    
        with("width","$width")->with("height",$height)->with("color","$color")->with("smile","$smile");
      
    }
    public function cerrarSesion(){
        //Desconctamos al usuario
        \Auth::logout();
        
        return redirect('/');
        
    }
}