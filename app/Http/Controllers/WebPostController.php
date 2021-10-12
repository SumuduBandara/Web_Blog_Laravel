<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use App\Models\PostComment;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
class WebPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('webblogpost.posts', compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make(
                $request->all(),
                [
                    
                    'comment' => ['required'],
                    

                ],
                [],
                [
                    'comment' => ['required'],

                ],
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {

                $Postcomment = new PostComment();
                $Postcomment->comment = $request->get("comment");
                $Postcomment->created_by = auth()->user()->id;
                $Postcomment->post_id = $id;
                $Postcomment->save();
                DB::commit();
                return redirect()->route("blogpost.comments", ["id" => $Postcomment->id])->withErrors($validator)->withInput()->with('sucs_msg', 'After approved by the administartor comment will be publish on the website!. Thank you for your comment');
               
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            // return redirect()->back()->with('err_msg', 'Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postcomment = PostComment::select(
            'post_comments.comment as postcomment',
            'post_comments.created_at as commentcreatedate',
            'userdt.name as bloggername',
            'userdt.email as useremail',
            'post_comments.status as poststatus'
        )
            ->join('users as userdt', 'userdt.id', 'post_comments.created_by')
            ->where('post_id', $id)
            ->where('status', 'P')
            ->orderBy("post_comments.id", "DESC")
            ->get();
        $post = Post::find($id);
        return view("webblogpost.postcomments", compact(['postcomment', 'post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
