@extends('layouts.default')
@section('title',"Post")
@section('content')
<div class="card card-pink card-outline">
    <div class="card-header">
        <h5 class="card-title">Create Post</h5>
    </div>
    <form action="{{ route("post.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="reqfield" for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old("title") }}">
                        <span class="error">{{ $errors->first('title') }}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="reqfield" for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">{{ old("description") }}</textarea>
                        <span class="error">{{ $errors->first('description') }}</span>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="reqfield" for="status">Status</label>
                        <select name="status" id="status" class="custom-select">
                            @if (auth()->user()->role == "ADMIN")    
                            <option {{ old("status")=="D"?"selected":"" }} value="D">Draft</option>
                            <option {{ old("status")=="P"?"selected":"" }} value="P">Publish</option>
                            @else
                            <option {{ old("status")=="D"?"selected":"" }} value="D">Draft</option>
                            @endif
                        </select>
                        <span class="error">{{ $errors->first('status') }}</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <a href="{{ route("post.index") }}" class="btn btn-outline-info">Back</a>
            <button type="submit" class="btn btn-success float-right">Save</button>
        </div>
    </form>
</div>

@endsection
