<?php

namespace App\Http\Controllers;
use \App\Models\Comment;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create()
    {
      return view('user.show');
    }
    public function store(Request $request)
    {
        $mensagens = array (
            'content.required' => 'É obrigatória uma texto para o comment',
    
        );
        $regras = array (
            'content' => 'required',
           
        
        );
        $validador = Validator::make($request->all(), $regras, $mensagens);

        if ($validador->fails()){
            return redirect()->back()
            ->withErrors($validador)
            ->withInput($request->all);
        }
        $obj = new Comment();
        $obj->content = $request['content'];
        $obj->user_id = Auth::id();
        $obj->post_id = $request['post_id'];
        $obj->save();
        
        return redirect()->back()->with('sucess', 'comentario criado com sucesso!');
      }
}
