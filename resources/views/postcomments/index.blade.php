@extends('layouts.default')
@section('title',"Post Comments")



@section('content')
<div class="card card-pink card-outline">
    <div class="card-header">
        <h5 class="card-title">Search</h5>
    </div>
    <form action="{{ route("postcomment.index") }}" method="GET">
        <div class="card-body">
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ request()->get("title") }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{ request()->get("description") }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Comment</label>
                        <input type="text" class="form-control" name="comment" value="{{ request()->get("comment") }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="custom-select">
                            <option value="">Select</option>
                            @foreach (config('comvals.ad_status',[]) as $ky => $item)
                            <option {{ request()->get("status")==$ky?"selected":"" }} value="{{$ky}}">{{$item}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>

        </div>
        <div class="card-footer">
            <a href="{{ route("post.index") }}" class="btn btn-outline-info">Reset</a>
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
                        <th scope="col">Post Title</th>
                        <th scope="col">Comment Date</th>
                        <th scope="col">Commentator Name</th>
                        <th scope="col">Comment</th>
                      
                        <th scope="col">Status</th>

                        

                        <th scope="col" style="width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listdata as $index=>$data)
                    <tr>
                        <th scope="row">{{ ($loop->iteration) }}</th>

                        <td>{{ $data->title }}</td>
                        <td>{{ $data->commentcreatedat }}</td>
                        <td>{{ $data->bloggername }}</td>
                        <td>{{ $data->comment }}</td>


                        @if($data->commentstatus=="T")
                        <td style='background-color:brown;color:#fff'>{{ config('comvals.ad_status',[])[$data->commentstatus] }}</td>
                        @elseif($data->commentstatus=="P")
                        <td style='background-color:#28a745;color:#fff'>{{ config('comvals.ad_status',[])[$data->commentstatus] }}</td>
                        @else
                        <td style='background-color:#e83e8c;color:#fff'>{{ config('comvals.ad_status',[])[$data->commentstatus] }}</td>
                        @endif

                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route("postcomment.show",["id"=>$data->commentid]) }}">View</a>
                            <a class="btn btn-success btn-xs" href="{{ route("postcomment.edit",["id"=>$data->commentid]) }}">Edit</a>
                            <a class="btn btn-danger btn-xs" href="{{ route("postcomment.delete",["id"=>$data->commentid]) }}">Delete</a>
                        </td>
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