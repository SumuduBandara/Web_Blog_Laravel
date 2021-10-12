@extends('layouts.default')
@section('title',"Users")



@section('content')
<div class="card card-pink card-outline">
    <div class="card-header">
        <h5 class="card-title">Search</h5>
    </div>
    <form action="{{ route("user.index") }}" method="GET">
        <div class="card-body">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ request()->get("name") }}">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" id="role" class="custom-select">
                            <option value="">Select</option>
                            @foreach (config('comvals.usr_roles',[]) as $ky => $item)
                            <option {{ request()->get("role")==$ky?"selected":"" }} value="{{$ky}}">{{$item}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="custom-select">
                            <option value="">Select</option>
                            @foreach (config('comvals.status',[]) as $ky => $item)
                            <option {{ request()->get("status")==$ky?"selected":"" }} value="{{$ky}}">{{$item}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            
            <button type="submit" class="btn btn-primary float-right">Search</button>

        </div>
    </form>
</div>

<div class="card card-pink card-outline">
    <div class="card-header">
        <h5 class="card-title">Result</h5>
    </div>
    <div class="card-body">


        <div class=" table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($listdata as $index=>$data)
                    <tr>
                        <th scope="row">{{ ($loop->iteration) }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{$data->role}}</td>
                        <td>{{ $data->is_active }}</td>
                      
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            {!! $listdata->links() !!}
        </div>
    </div>

</div>
@endsection
