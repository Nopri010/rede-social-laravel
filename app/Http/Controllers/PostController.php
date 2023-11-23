<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function create()
    {
      return view('posts.create');
    }
    public function store(Request $request)
    {
        $mensagens = array (
            'content.required' => 'É obrigatória um texto para o post',
            //'user_id.required' => 'É obrigatório o user do post',
        );
        $regras = array (
            'content' => 'required',
            //'user_id' => 'required|string',
        
        );
        $validador = Validator::make($request->all(), $regras, $mensagens);

        if ($validador->fails()){
            return redirect ('post/create')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        $obj_post = new Post();
        $obj_post->content = $request['content'];
        $obj_post->user_id = Auth::id();
        $obj_post->save();
        
        return redirect('/home')->with('sucess', 'post criado com sucesso!');
      }

      public function like($id){
        $post = Post::find($id);
        $user_id = Auth::id();
        $usuarioAutenticado = User::where('id', $user_id)->first();
        $usuarioAutenticado->likedPosts()->attach($post);
  
        return redirect()->back();
      }
  
      public function dislike($id){
        $post = Post::find($id);
        $user_id = Auth::id();
        $usuarioAutenticado = User::where('id', $user_id)->first();
        $usuarioAutenticado->likedPosts()->detach($post);
  
        return redirect()->back();
      }
  



}
