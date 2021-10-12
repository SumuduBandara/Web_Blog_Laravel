@extends('layouts.default')
@section('title',"Post")
@section('content')
<div class="card card-pink card-outline">
    <div class="card-header">
        <h5 class="card-title">Update Post</h5>
    </div>
    <form action="{{ route("post.update",request()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="reqfield" for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ old("title",$post->title) }}">
                        <span class="error">{{ $errors->first('title') }}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="reqfield" for="description">Description</label>
                        <textarea name="description" id="description"
                            class="form-control">{{ old("description",$post->description) }}</textarea>
                        <span class="error">{{ $errors->first('description') }}</span>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="reqfield" for="status">Status</label>
                        <select name="status" id="status" class="custom-select">
                            @foreach (config('comvals.ad_status',[]) as $ky => $item)
                            <option {{ old("status",$post->status)==$ky?"selected":"" }} value="{{$ky}}">{{$item}} </option>
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
            <a href="{{ route("post.index") }}" class="btn btn-outline-info">Back</a>
            <button type="submit" class="btn btn-success float-right">Save</button>
        </div>
    </form>
</div>

@endsection
