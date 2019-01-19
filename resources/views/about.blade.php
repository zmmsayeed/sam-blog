@extends('layouts.app')

@section('content')
<div class="container" id="about">
    <h4 class="about_head text-center">
        Samhitha Bhat <br>
        <span class="about_subhead text-center">Blogger/Engineer</span>
    </h4>
    <hr>

    <div class="row">
        <div class="col-md-4 offset-md-2">
            <img src="{{ url('images/sam.png') }}" alt="Me" class="img-fluid">
        </div>
        <div class="col-md-5">
            <p>My name is Samhitha Bhat, I'm 21, and welcome to theconfusedengineer, a 
                digital destination for all things lifestyle, travel, health and fashion(SOOON) Born and 
                raised in Bangalore, India, I started this website in 2018 during my 3rd year of Engineering
                 in Computer Science. I still had no idea what I wanted to do, so I started a blog as an escape 
                 to everyday life and document the things I love – whether it be a new story, a latest obsession 
                 or ticking somewhere off my bucket list.</p>

            <p>My goal is to instill a spark of inspiration into your day to day life. Talk about things 
                you can relate to. Spread positivity and most importantly I write for people who crave for
                 an escape, a full passport, who’s heart leaps with excitement and who aims to be the best 
                 damn version of themselves.</p>
        </div>
    </div>
</div>
@endsection
