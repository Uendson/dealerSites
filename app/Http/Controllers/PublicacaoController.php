<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Publicacao;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Testing\File;
use Faker\Factory as Faker;

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
        if(auth()->user() != null AND (auth()->user()->permissao == 'administrador' OR auth()->user()->id == $id)){

            $publi = Publicacao::find($id);   
        
            return view('publicacao', ['publi' => $publi]);
        }else{
            return redirect()->route('publicacao.index');
        }
        

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
