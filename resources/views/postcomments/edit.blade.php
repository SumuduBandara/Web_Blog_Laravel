@extends('layouts.default')
@section('title',"Post Comments")
@section('content')
<div class="card card-pink card-outline">
    <div class="card-header">
        <h5 class="card-title">Update Post Comment</h5>
    </div>
    <form action="{{ route("postcomment.update",request()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">

               
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="reqfield" for="comment">Comments</label>
                        <textarea name="comment" id="comment"
                            class="form-control">{{ old("comment",$postcomments->comment) }}</textarea>
                        <span class="error">{{ $errors->first('comment') }}</span>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="reqfield" for="status">Status</label>
                        <select name="status" id="status" class="custom-select">
                            @foreach (config('comvals.ad_status',[]) as $ky => $item)
                            <option {{ old("status",$postcomments->status)==$ky?"selected":"" }} value="{{$ky}}">{{$item}} </option>
                            @endforeach
                        </select>
                        <span class="error">{{ $errors->first('status') }}</span>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label>View Count</label>
                        <input type="text" class="form-control" name="view_count">
                    </div>
                </div> --}}

            </div>

        </div>
        <div class="card-footer">
            <a href="{{ route("postcomment.index") }}" class="btn btn-outline-info">Back</a>
            <button type="submit" class="btn btn-success float-right">Save</button>
        </div>
    </form>
</div>

@endsection
