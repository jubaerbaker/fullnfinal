<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $posts = Post::where('user_id', Auth::user()->id)->latest('created_at')->get();
            $categories = Category::where('user_id', Auth::user()->id)->get();
        } else {
            $posts = [];
            $categories = [];
        }
        return view('allposts')->with('posts', $posts)->with('categories', $categories)->with('courses', Course::all());
    }

    public function byCategory($cat_id)
    {
        if (Auth::check()) {
            $posts = DB::table('posts')->where([
                ['category_id', '=', $cat_id],
                ['user_id', '=', Auth::user()->id],
            ])->get();
            $categories = Category::where('user_id', Auth::user()->id)->get();
        } else {
            $posts = [];
            $categories = [];
        }
        return view('allposts')->with('posts', $posts)->with('categories', $categories)->with('courses', Course::all());
    }

    public function singlePost($id)
    {
        if (Auth::check()) {
            $posts = Post::where('user_id', Auth::user()->id)->latest('created_at')->get();
            $post = DB::table('posts')->where('id', '=', $id)->first();
            $categories = Category::where('user_id', Auth::user()->id)->get();
        } else {
            $post = [];
            $categories = [];
        }
        return view('singlepost')->with('post', $post)->with('categories', $categories)->with('courses', Course::all())->with('posts', $posts);
    }
}
