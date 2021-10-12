<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        if (Auth::guest()) {
            //Pass blosg post
            $posts = Post::select(
                'posts.id as postid',
                'posts.created_at as createdate',
                'userdt.name as bloggername',
                'userdt.email as useremail',
                'posts.title as title',
                'posts.description as description',
                'posts.status as poststatus'
            )
                ->join('users as userdt', 'userdt.id', 'posts.created_by')
                ->where('posts.status', "P")
                ->orderBy("posts.id", "DESC")
                ->get();
            return view('web', compact("posts"));
        } else {

            //Pass blosg post
            $posts = Post::select(
                'posts.id as postid',
                'posts.created_at as createdate',
                'userdt.name as bloggername',
                'userdt.email as useremail',
                'posts.title as title',
                'posts.description as description',
                'posts.status as poststatus'
            )
                ->join('users as userdt', 'userdt.id', 'posts.created_by')
                ->where('posts.status', "P")
                ->orderBy("posts.id", "DESC")
                ->get();
            $listdata = Post::where("status", "P")->paginate(10)->appends(request()->query());
            return view('web', compact("posts"));
        }
    }



    public function dash()
    {



        if (Auth::user()->is_active == "A") {

            $posts = Post::select(
                'posts.id as postid',
                'posts.created_at as createdate',
                'userdt.name as bloggername',
                'userdt.email as useremail',
                'posts.title as title',
                'posts.description as description',
                'posts.status as poststatus'
            )
                ->join('users as userdt', 'userdt.id', 'posts.created_by')
                ->where('posts.status', "D")
                ->orderBy("posts.id", "DESC")
                ->get();
            return view('home', compact("posts"));
        } else {
            $msg = "Your Account is writing for an approval or deactiveted.";
            return view('processing_msg', compact("msg"));
        }
    }
}
