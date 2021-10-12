<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class PostController extends Controller
{

    public function index(Request $request)
    {

        if (auth()->user()->role == "BLOGGER") {

            $listdata = Post::select(
                'posts.id as postid',
                'posts.created_at as createdate',
                'users.name as bloggername',
                'users.email as useremail',
                'posts.title as title',
                'posts.description as description',
                'posts.status as poststatus'
            )
                ->leftJoin('users', 'users.id', '=', 'posts.created_by')
                ->where("created_by", auth()->user()->id)
                ->when(!empty($request->title), function ($q) use ($request) {
                    $q->where("title", "like", "%" . $request->title . "%");
                })
                ->when(!empty($request->description), function ($q) use ($request) {
                    $q->where("description", "like", "%" . $request->description . "%");
                })
                ->when(!empty($request->status), function ($q) use ($request) {
                    $q->where("status", $request->status);
                })
               
                ->paginate(10)->appends(request()->query());
        } else {
            $listdata = Post::select(
                'posts.id as postid',
                'posts.created_at as createdate',
                'users.name as bloggername',
                'users.email as useremail',
                'posts.title as title',
                'posts.description as description',
                'posts.status as poststatus'
            )
                ->leftJoin('users', 'users.id', '=', 'posts.created_by')
                ->when(!empty($request->title), function ($q) use ($request) {
                    $q->where("title", "like", "%" . $request->title . "%");
                })
                ->when(!empty($request->description), function ($q) use ($request) {
                    $q->where("description", "like", "%" . $request->description . "%");
                })
                ->when(!empty($request->status), function ($q) use ($request) {
                    $q->where("status", $request->status);
                })
              
                ->paginate(10)->appends(request()->query());
        }
        return view("post.index", compact("listdata"));
    }

    public function create()
    {
        return view("post.create");
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make(
                $request->all(),
                [
                    'title' => ['required'],
                    'description' => ['required'],
                    'status' => ['required'],

                ],
                [],
                [
                    'title'  => 'Title',
                    'description'  => 'Description',
                    'status'  => 'Status',

                ],
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $Post = new Post();
                $Post->title = $request->get("title");
                $Post->description = $request->get("description");
                $Post->status = $request->get("status");

                // dd(auth()->user());
                $Post->created_by = auth()->user()->id;
                $Post->save();
                DB::commit();
                return redirect()->route("post.edit", ["id" => $Post->id])->withInput();
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            // return redirect()->back()->with('err_msg', 'Error!');
        }
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view("post.show", compact("post"));
    }

    public function edit(Request $request)
    {
        $post = Post::find($request->id);
        return view("post.edit", compact("post"));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make(
                $request->all(),
                [
                    'title' => ['required'],
                    'description' => ['required'],
                    'status' => ['required'],
                ],
                [],
                [
                    'title'  => 'Title',
                    'description'  => 'Description',
                    'status'  => 'Status',
                ],
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $Post = Post::find($id);
                $Post->title = $request->get("title");
                $Post->description = $request->get("description");
                $Post->status = $request->get("status");

                $Post->created_by = auth()->user()->id;
                $Post->save();
            }
            DB::commit();
            return redirect()->route("post.edit", ["id" => $Post->id])->withErrors($validator)->withInput()->with('sucs_msg', 'Update Successful!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('err_msg', 'Error!');
        }
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $delete = true;
        return view("post.delete", compact("post", "delete"));
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Post::find($id)->delete();
            DB::commit();
            return redirect()->route("post.index")->withInput();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('err_msg', 'Error!');
        }
    }
}
