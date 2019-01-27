<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Publicacao;

class PublicacaoController extends Controller
{
    //

    public function __construct()
    {                                   
        //$this->middleware('auth');
    }

    public function index(Publicacao $publicacao)    
    {                              
        $publicacao = $publicacao->select('publicacaos.*', 'users.name')->join('users','publicacaos.idUser','=','users.id')->orderBy('publicacaos.id','DESC')->paginate(2);                
        return view('homePublicacao',compact('publicacao'));        
    }           

    public function create()
    {   
        $publi = null;
        return view('publicacao', ['publi' => $publi]);
    }

    public function show($id){
        $publi = Publicacao::find($id);
        
        return view('verPublicacao', ['publi' => $publi]);        
    }

    public function store(Request $request, Publicacao $publicacao)
    {
        $request = $publicacao->salvar($request);
        //$inseriu = $publicacao->create($request->all());        
        
        if($request){
            //$publicacao = Publicacao::orderBy('id','DESC')->paginate(2);

            //return view('home',compact('publicacao'));
            return redirect()->route('publicacao.index');
        }
        return redirect()->back(); 
        
    }   

    public function edit($id)
    {   
        $publi = Publicacao::find($id);   
        
        return view('publicacao', ['publi' => $publi]);

    }

    public function update(Request $request, $id)
    {        
        $publi = new Publicacao();
        
        $request = $publi->salvar($request);       
        
        if($request){
            
            return redirect()->route('publicacao.index');
        }
        return redirect()->back(); 
    }
}
