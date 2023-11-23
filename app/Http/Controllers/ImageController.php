<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Image;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    
public function index3()
{
    return view('image3');
}

/**
 * UPLOAD DE UMA IMAGEM USANDO DRAG AND DROP (ARRASTA E SOLTA)
 * 
 * Recebe a imagem junto com os dados do formulário
 */
public function store3(Request $request)
{
    //pega o conteúdo do post, campo textarea
    $conteudo = $request->input('content');

    //pega a imagem que veio no formulário
    $image = $request->file('file');
    //define um novo nome
    $imageName = time().'.'.$image->extension();
    //salva a imagem na pasta /public/storage/image
    $image->move(public_path('storage/image/'),$imageName);

    //deve fazer o salvamento no banco de dados de um post
    //não vai funcionar aqui pq não existe o model Post e Photo
    $post = new Post();
    $post->content = $request['content'];
    $post->user_id = Auth::id();
    $post->save();

    //deve fazer o salvamento da imagem
    //não vai funcionar aqui pq não existe o model Post e Photo
    $foto = new Photo();
    $foto->image_path = $imageName;
    $foto->post_id = $post->id;
    $foto->save();

    return response()->json(['success'=>$imageName]);
}

}
