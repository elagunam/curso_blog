<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class Inicio extends Controller
{
    public function inicio(){
        $posts = Post::paginate(20);
        return view('welcome', ['posts' => $posts]);
    }
}
