@extends('layouts.app')
@section('content')

    <div class="conteiner-fluid">
    <div class="row">
        <div class="col-md-7 offset-2 mb-4">
        <div class="card">
            <div class="card-body text-center">
                        <h2>{{ $user->name }}</h2>
          
            <hr>
            @if($user->follows->count() > 0)
                    Seguindo   <span class="badge rounded-pill bg-primary">
                    {{$user->follows->count()}}
                    </span>
            @endif
                @if($user->followers->count() > 0)
                  Seguidores <span class="badge rounded-pill bg-primary">
                                {{$user->followers->count()}}
                    </span>     
                    <hr>
                @endif
            </div>
        </div>
        </div>
    </div>
</div>
        @foreach($listaPosts as $umPost)
            <div class="col-md-7 offset-2">
                <div class="card">
                    <div class="card-header">
                        {{ $umPost->user->name }}
                    </div>
                    @if($umPost->photos->count() > 0) 
                        <img src="/storage/image/{{ $umPost->photos[0]->image_path }}" class="card-img-top">
                    @endif
                    <div class="card-body text-center">
                        {{ $umPost->content }} 
                        <small class="text-muted">
                        {{\Carbon\Carbon::parse($umPost->created_at)->format('d/m/Y h:m')}}
                        </small>
                    </div>
                    <div class="card-footer">
                        @if($umPost->comments->count() > 0)
                            Comentários: 
                            <span class="badge rounded-pill bg-primary">
                            {{ $umPost->comments->count() }}
                            </span>
                        @endif
                        @if($umPost->likes->count() > 0)
                            Likes:
                            <span class="badge rounded-pill bg-primary">
                            {{ $umPost->likes->count() }}
                            </span>
                            @foreach($umPost->likes as $umLike)
                            
                            @endforeach

                        </p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
</div>



@endsection