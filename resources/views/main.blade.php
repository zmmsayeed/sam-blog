@extends('layouts.app')

@section('content')
<div class="container-fluid main-section">
    <div class="row">
        <div class="col-md-6 offset-md-4 text-right text-box">
            <h1 class="main-heading">Samhitha Bhat</h1>
            <h4 class="sub-title">Engineer by profession, blogger by heart.</h4>
            <p>
                <a href=""><i class="fab fa-facebook-f fa-2x circle-icon"></i></a>
                <a href=""><i class="fab fa-twitter fa-2x circle-icon"></i></a>
                <a href=""><i class="fab fa-instagram fa-2x circle-icon1"></i></a>
            </p>
        </div>
    </div>
</div>

<div class="container-fluid blog" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h1>Blog Posts</h1>
                <p>Read here something</p>
            </div>
            <div class="col-md-4 d-none d-lg-block">
                <form method="POST" action='{{ url("/search") }}' style="margin-top:15px;">
                {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" 
                        placeholder="Search the blog" style="margin-right: 20px;">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">Go!</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <hr>

        <div class="row">
            @if(count($posts) > 0)
                @foreach($posts->all() as $post)
                <div class="col-md-4 my-2">
                    <h4>{{ $post->post_title }}</h4>
                    <img src="{{ $post->post_image }}" alt="" class="img-fluid post-pic">
                    <p class="text-justify">
                        {{ substr($post->post_body, 0, 150) }}... 
                        <a href='{{ url("/view/{$post->id}") }}'>
                            Read More
                        </a>
                    </p>
                    <ul class="nav nav-pills">
                        @if(Auth::id() == 1)
                        <li class="nav-item">
                            <a class="nav-link" href='{{ url("/edit/{$post->id}") }}'>
                                <span class="fas fa-edit">&nbsp;Edit</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='{{ url("/delete/{$post->id}") }}'>
                                <span class="fas fa-trash-alt">&nbsp;Delete</span>
                            </a>
                        </li>
                        @endif
                    </ul>                

                    <cite>Posted on: {{ date('M j, Y', strtotime($post->updated_at)) }}</cite>
                    <hr>
                
                </div>
                @endforeach

            @else
                <p>No Posts Available</p>
            @endif   
        </div>
        <div class="row text-center"> 
            <div class="col-md-6 text-center">
                {{ $posts->links() }}
            </div>
        </div>

    </div>
</div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">Dashboard</div>
                        <div class="col-md-8">
                            <form method="POST" action='{{ url("/search") }}'>
                            {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" 
                                    placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">Go!</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">  
                    <div class="col-md-8 offset-md-2">                    
                        @if(count($posts) > 0)
                            @foreach($posts->all() as $post)
                                <h4>{{ $post->post_title }}</h4>
                                <img src="{{ $post->post_image }}" alt="" class="img-fluid">
                                <p>{{ substr($post->post_body, 0, 150) }}...</p>

                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link" href='{{ url("/view/{$post->id}") }}'>
                                            <span class="fas fa-eye">&nbsp;View</span>
                                        </a>
                                    </li>
                                    @if(Auth::id() == 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href='{{ url("/edit/{$post->id}") }}'>
                                            <span class="fas fa-edit">&nbsp;Edit</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href='{{ url("/delete/{$post->id}") }}'>
                                            <span class="fas fa-trash-alt">&nbsp;Delete</span>
                                        </a>
                                    </li>
                                    @endif
                                </ul>                

                                <cite>Posted on: {{ date('M j, Y', strtotime($post->updated_at)) }}</cite>
                                <hr>
                            @endforeach

                        @else
                            <p>No Posts Available</p>
                        @endif   
                        
                        {{ $posts->links() }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
