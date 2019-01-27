<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Publicacao;

class VerPublicacaoController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {        
        //return view('publicacao');
    }       


    public function VerPubli(){
        
        //$publi = Publicacao::find($id);
        
        return view('verPublicacao');
    }    
}
