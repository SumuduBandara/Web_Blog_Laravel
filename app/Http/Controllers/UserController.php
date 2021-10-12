<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $listdata = User::when(!empty($request->name), function ($q) use ($request) {
            $q->where("name", "like", "%" . $request->name . "%");
        })
            ->when(!empty($request->role), function ($q) use ($request) {
                $q->where("role", "=", $request->role);
            })
            ->when(!empty($request->status), function ($q) use ($request) {
                $q->where("is_active", "=", $request->status);
            })
            ->paginate(10)->appends(request()->query());
        return view("user.index", compact("listdata"));
    }

    public function create()
    {
        return view("user.create");
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make(
                $request->all(),
                [
                    'grade' => ['required'],
                ],
                [],
                [
                    'grade'  => 'Grade',
                ],
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $grade = new Grade();
                $grade->grade = $request->get("grade");
                $grade->save();
            }
            DB::commit();
            return redirect()->route("user.edit", ["id" => $grade->id])->withErrors($validator)->withInput()->with('sucs_msg', 'Successful!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('err_msg', 'Error!');
        }
    }

    public function show($id)
    {
        $grade = User::find($id);
        return view("user.show", compact("grade"));
    }

    public function edit(Request $request)
    {
        $grade = User::find($request->id);
        return view("user.edit", compact("grade"));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make(
                $request->all(),
                [
                    'grade' => ['required'],
                ],
                [],
                [
                    'grade'  => 'Grade',
                ],
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $grade = User::find($request->id);
                $grade->grade = $request->get("grade");
                $grade->save();
            }
            DB::commit();
            return redirect()->route("user.edit", ["id" => $grade->id])->withErrors($validator)->withInput()->with('sucs_msg', 'Update Successful!');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            return redirect()->back()->with('err_msg', 'Error!');
        }
    }

    public function delete($id)
    {
        $grade = User::find($id);
        return view("user.delete", compact("grade"));
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            User::find($id)->delete();
            DB::commit();
            return redirect()->route("user.index")->withInput();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('err_msg', 'Error!');
        }
    }
}
