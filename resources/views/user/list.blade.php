@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
   <ul>
    @foreach ($userList as $umuser)
            <div class="card mb-3 col-md-7">
              <div class="card-body"> 
                <ul>
                <a class="link-offset-2 link-underline link-underline-opacity-0" href="/user/{{$umuser->id}}">{{$umuser->id}} - {{$umuser->name}} -></a>
                        @if(!$umuser->followers->contains($usuarioAutenticado))
                            <a href="/follow/{{$umuser->id}}" class="btn btn-dark float-none">Seguir</a>
                        @else
                            <a href="/unfollow/{{$umuser->id}}" class="btn btn-secondary float-none">Deixar</a>
                        @endif
                    
                </ul>
            </div> 
            </li>
            </div>
        @endforeach
            

                </div class="card mb-3 col-md-7">
                 {{$userList-> links()}} 
                </div>
                </div>
</ul>
@endsection-