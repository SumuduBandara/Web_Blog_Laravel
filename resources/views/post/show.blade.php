@extends('layouts.default')
@section('title',"Post")
@section('content')
<div class="card card-pink card-outline">
    <div class="card-header">
        <h5 class="card-title">Post</h5>
    </div>
    <fieldset disabled>
        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="reqfield" for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ $post->title }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="reqfield" for="description">Description</label>
                        <textarea name="description" id="description"
                            class="form-control">{{ $post->description }}</textarea>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="reqfield" for="status">Status</label>
                        <select name="status" id="status" class="custom-select">
                            @foreach (config('comvals.ad_status',[]) as $ky => $item)
                            <option {{ old("status",$post->status)==$ky?"selected":"" }} value="{{$ky}}">
                                {{$item}} </option>
                            @endforeach
                        </select>
                        <span class="error">{{ $errors->first('status') }}</span>
                    </div>
                </div>
            </div>

        </div>
    </fieldset>
    <div class="card-footer">
        <a href="{{ route("post.index") }}" class="btn btn-outline-info">Back</a>
    </div>
</div>

@endsection
