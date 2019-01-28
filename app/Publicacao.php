<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class Publicacao extends Model
{
    //use Notifiable;

    //protected $table = 'publicacao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idUser', 'titulo', 'conteudo', 'imagem'
    ];  


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'password', 'remember_token',
    ];    

    public function salvar(Request $request, $id = 0){
        
        $nomeImg = null;    
        $resposta = false;    

        if($id > 0){            
            $this->find($id);
        }
        $this->idUser   = auth()->user()->id;
        $this->titulo   = $request->titulo;
        $this->conteudo = $request->conteudo;

        $inseriu = $this->save();        
               
        if ($inseriu){
            if ($request->hasFile('imgPubli') && $request->file('imgPubli')->isValid()) {                                                

                $nomeImg = "publicacao{$this->id}.{$request->imgPubli->extension()}";

                $upload = $request->imgPubli->storeAs('/', $nomeImg);
                                
                $this->imagem = $upload;
                
                $this->save(); 
                
                $resposta = true;                           
            }
        }else{
            $resposta = false;
        }

        return $resposta;        
              
    }
}
