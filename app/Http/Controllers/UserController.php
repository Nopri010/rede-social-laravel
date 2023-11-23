<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
      
      return view('user.list');
    }
    public function index()
    {
        $listaUser = User::simplePaginate(5);
        $user_id = Auth::id();
      $usuarioAutenticado = User::where('id', $user_id)->with('follows')->first();
        return view('user.list',['userList'=>$listaUser ,  'usuarioAutenticado' => $usuarioAutenticado]);
    }
    public function show($id)
    {
        $User = User::where('id', $id)->with('posts',
                                              'posts.comments',
                                              'posts.comments.user',
                                              'posts.likes',
                                              'posts.likes.user',
                                              'follows',
                                              'followers')->first();
      //dd($listaUser);
      $user_id = Auth::id();
      $usuarioAutenticado = User::where('id', $user_id)->with('follows')->first();
      return view('user.show', ['user' => $User, 'usuarioAutenticado' => $usuarioAutenticado]);
    }

    public function follow($id){
      $user = User::find($id);
      $user_id = Auth::id();
      $usuarioAutenticado = User::where('id', $user_id)->with('follows')->first();
      $usuarioAutenticado->follows()->attach($user);

      return redirect()->back();
    }

    public function unfollow($id){
      $user = User::find($id);
      $user_id = Auth::id();
      $usuarioAutenticado = User::where('id', $user_id)->with('follows')->first();
      $usuarioAutenticado->follows()->detach($user);

      return redirect()->back();
    }

}
