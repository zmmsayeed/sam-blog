<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);                       
        // return view('home', ['profile' => $profile, 'posts' => $posts]);
        return view('main', ['posts' => $posts]);
    }
}
