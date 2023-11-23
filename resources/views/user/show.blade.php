@extends('layouts.app')
@section('content')

    <div class="conteiner-fluid">
    <div class="row">
        <div class="col-md-6 offset-2 mb-4">
        <div class="card">
            <div class="card-body text-center">
                        <h2>{{ $user->name }}</h2>
                        @if(!$user->followers->contains($usuarioAutenticado))
                            <a href="/follow/{{$user->id}}" class="btn btn-dark float-none">Seguir</a>
                        @else
                            <a href="/unfollow/{{$user->id}}" class="btn btn-secondary float-none">Deixar</a>
                        @endif
                </div>      
        </div>
        </div>
    </div>
    </div>

    <div class="row">
            <div class="col-md-6 offset-2">
                @foreach($user->posts as $umPost)
                <div class="card">
                <div class="card-header">
                        {{ $umPost->user->name }}
                    </div>
                    <div class="card-body text-center">
                    @if($umPost->photos->count() > 0) 
                        <img src="storage/image/{{ $umPost->photos[0]->image_path }}" class="card-img-top">
                    @endif
                        {{ $umPost->content }} 
                        <br>
                        <small class="text-muted">
                        {{\Carbon\Carbon::parse($umPost->created_at)->format('d/m/Y h:m')}}
                        </small>
                    </div>
                    <div class="card-footer">
                        @if($umPost->comments->count() > 0)
                        <p>
                            Comentários: 
                            <span class="badge rounded-pill bg-primary">
                            {{ $umPost->comments->count() }}

                            </span>
                        </p>            
                <br>   
                <article id="content">
                    <p>
                        <ul class="list-group">
                            @foreach($umPost->comments as $umComment)
                                <li class="list-group-item">
                                    <b>{{$umComment->user->name}}: </b> {{ $umComment->content }} 
                                    <small class="text-muted">
                                        {{\Carbon\Carbon::parse($umComment->created_at)->format('d/m/Y h:m')}}
                                    </small>
                                </li>
                            @endforeach
                        </ul>
                        @endif
                        <br>
                    </p>
   
     <ul>                   
<hr>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<form action="/comment" method="post">
    @csrf
    <label for="content">Conteúdo</label> 
    <input type="hidden" name="post_id" value="{{ $umPost->id }}">
    <textarea id="content" name="content" cols="40" rows="5" class="form-control"></textarea>
<br>
    <button name="submit1" type="submit1" class="btn btn-dark">Salvar</button>
</form>

</ul>      
                        <br>
                        @if($umPost->likes->count() > 0)
                        <p>
                            Likes:
                            <span class="badge rounded-pill bg-primary">
                            {{ $umPost->likes->count() }}
                            </span>
                            
                            @if(!$umPost->likes->contains('user_id',$usuarioAutenticado->id))
                            <a href="/like/{{$umPost->id}}" class="btn btn-sm btn-dark">Like
                            <i class="bi bi-heart"></i></a>
                            @else
                            <a href="/dislike/{{$umPost->id}}" class="btn btn-sm btn-secondary">Dislike</a>
                            @endif
                            <ul class="list-group">
                            @foreach($umPost->likes as $umLike)
                                <li class="list-group-item">
                                    {{ $umLike->user->name }}
                                </li>
                            @endforeach
                            </ul>
                        </p>
                        @endif
                        </ul>
                    </div>
                </div>  
                <br>                  
                @endforeach
            </div>

            <div class="col-md-4">
            <div class="card" style="width: 18rem;">
            @if($user->follows->count() > 0)
                    <div class="card-body">
                    <h5 class="card-title card-header">Seguindo   <span class="badge rounded-pill bg-primary">
                    {{$user->follows->count()}}
                    </span></h5>
                  
                        <ul class="list-group">
                        @foreach($user->follows as $seguindo)
                            <li class="list-group-item">{{ $seguindo->name }}</li>
                        @endforeach
                        </ul>
            @endif
                        <br>
                @if($user->followers->count() > 0)
                    <h5 class="card-title card-header">Seguidores <span class="badge rounded-pill bg-primary">
                                {{$user->followers->count()}}
                    </span></h5>
                        <ul class="list-group">
                        @foreach($user->followers as $seguidores)
                            <li class="list-group-item">{{ $seguidores->name }}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>      
                @endif
</div>
</div>
@endsection
