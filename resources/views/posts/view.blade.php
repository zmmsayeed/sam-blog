@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('response'))
                <div class="alert alert-success">{{ session('response') }}</div>
            @endif
            <div class="card">
                <div class="card-header">Post View</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                    <div class="col-md-3">
                        <ul class="list-group">
                            @if(count($categories) > 0)
                                @foreach($categories->all() as $category)
                                <li class="list-group-item">
                                    <a href='{{ url("category/{$category->id}") }}'>
                                        {{ $category->category }}
                                    </a>
                                </li>
                                @endforeach
                            @else
                                <p>No categories found!</p>
                            @endif                            
                        </ul>
                    </div>

                    <div class="col-md-8">                    
                        @if(count($posts) > 0)
                            @foreach($posts->all() as $post)
                                <h4>{{ $post->post_title }}</h4>
                                <img src="{{ $post->post_image }}" alt="" class="img-fluid">
                                <p>{{ $post->post_body }}</p>

                                @guest
                                <p><b><a href='{{url("/login")}}'>Login</a> to like and comment on the post</b></p>
                                @else            
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link" href='{{ url("/like/{$post->id}") }}'>
                                            <span class="fas fa-thumbs-up">
                                                <span class="fass">
                                                    &nbsp;Like ({{$likeCtr}})
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href='{{ url("/dislike/{$post->id}") }}'>
                                            <span class="fas fa-thumbs-down">
                                                <span class="fass">&nbsp;Disike ({{$dislikeCtr}})</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href='{{ url("/comment/{$post->id}") }}'>
                                            <span class="fas fa-comments">
                                                <span class="fass">&nbsp;Comment</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>  
                                @endguest              
                            @endforeach

                        @else
                            <p>No Posts Available</p>
                        @endif

                        @guest

                        @else
                        <form method="POST" action='{{ url("/comment/{$post->id}") }}'>
                        {{csrf_field()}}
                            <div class="form-group">
                                <textarea name="comment" id="comment" cols="30" rows="6" class="form-control" required>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg btn-block">POST COMMENT</button>
                            </div>
                        </form>
                        @endguest
                        
                        <h3>Comments</h3>
                        @if(count($comments) > 0)
                            @foreach($comments->all() as $comment)
                                <p>{{ $comment->comment }}</p>
                                <p>Postedby: {{ $comment->name }}</p>
                                <hr>
                            @endforeach
                        @else
                            <p>No Comments Available</p>
                        @endif 
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
