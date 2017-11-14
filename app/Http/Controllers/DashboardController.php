<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::orderby('id', 'desc')->paginate(5); 
        //dd($posts);
        return view('dashboard', [
          'posts'=>$posts
        ]);
    }
}
