<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->role == "BLOGGER") {

            $listdata = PostComment::select(
                'post_comments.id as commentid',
                'post_comments.comment as comment',
                'post_comments.created_by as commentcreatedby',
                'post_comments.created_at as commentcreatedat',
                'post_comments.created_at as commentcreatedat',
                'post_comments.status as commentstatus',
                'posts.id as postid',
                'posts.created_at as createdate',
                'users.name as bloggername',
                'users.email as useremail',
                'posts.title as title',
                'posts.description as description',
                'posts.status as poststatus'
            )
                ->Join('users', 'users.id', '=', 'post_comments.created_by')
                ->Join('posts', 'posts.id', '=', 'post_comments.post_id')
                ->where("post_comments.created_by", auth()->user()->id)
                ->when(!empty($request->title), function ($q) use ($request) {
                    $q->where("title", "like", "%" . $request->title . "%");
                })
                ->when(!empty($request->title), function ($q) use ($request) {
                    $q->where("comment", "like", "%" . $request->comment . "%");
                })
                ->when(!empty($request->description), function ($q) use ($request) {
                    $q->where("description", "like", "%" . $request->description . "%");
                })
                ->when(!empty($request->status), function ($q) use ($request) {
                    $q->where("post_comments.status", $request->status);
                })
               
                ->paginate(10)->appends(request()->query());
        } else {
            $listdata = PostComment::select(
                'post_comments.id as commentid',
                'post_comments.comment as comment',
                'post_comments.created_by as commentcreatedby',
                'post_comments.created_at as commentcreatedat',
                'post_comments.created_at as commentcreatedat',
                'post_comments.status as commentstatus',
                'posts.id as postid',
                'posts.created_at as createdate',
                'users.name as bloggername',
                'users.email as useremail',
                'posts.title as title',
                'posts.description as description',
                'posts.status as poststatus'
            )
                ->Join('users', 'users.id', '=', 'post_comments.created_by')
                ->Join('posts', 'posts.id', '=', 'post_comments.post_id')

                ->when(!empty($request->title), function ($q) use ($request) {
                    $q->where("title", "like", "%" . $request->title . "%");
                })
                ->when(!empty($request->title), function ($q) use ($request) {
                    $q->where("comment", "like", "%" . $request->comment . "%");
                })
                ->when(!empty($request->description), function ($q) use ($request) {
                    $q->where("description", "like", "%" . $request->description . "%");
                })
              
                ->when(!empty($request->status), function ($q) use ($request) {
                    $q->where("post_comments.status", $request->status);
                })
              
                ->paginate(10)->appends(request()->query());
        }
        return view("postcomments.index", compact("listdata"));
         
     
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postcomments = PostComment::find($id);
        return view("postcomments.show", compact("postcomments"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $postcomments = PostComment::find($request->id);
        return view("postcomments.edit", compact("postcomments"));
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

      
        try {
            DB::beginTransaction();
            $validator = Validator::make(
                $request->all(),
                [
                   
                    'comment' => ['required'],
                    'status' => ['required'],
                   
                ],
                [],
                [
                   
                    'comment'  => 'Description',
                    'status' => ['required'],
                   
                ],
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $PostComment = PostComment::find($id);
               
                $PostComment->comment = $request->get("comment");
                $PostComment->status = $request->get("status");

                $PostComment->created_by = auth()->user()->id;
                $PostComment->save();
            }
            DB::commit();
            return redirect()->route("postcomment.edit", ["id" => $PostComment->id])->withErrors($validator)->withInput()->with('sucs_msg', 'Update Successful!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('err_msg', 'Error!');
        }
    }


    public function delete($id)
    {
        $postcomment = PostComment::find($id);
        $delete = true;
        return view("postcomments.delete", compact("postcomment", "delete"));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            PostComment::find($id)->delete();
            DB::commit();
            return redirect()->route("postcomment.index")->withInput();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('err_msg', 'Error!');
        }
    }
}
