<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacao;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        //return view('home');            
        //$publicacao = Publicacao::orderBy('id','DESC')->paginate(2);   
    
        //return view('homePublicacao',compact('publicacao'));

        return redirect()->route('publicacao.index');
    }
}
