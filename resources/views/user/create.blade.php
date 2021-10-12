@extends('layouts.default')
@section('title',"Grade")
@section('content')
<div class="card card-pink card-outline">
    <div class="card-header">
        <h5 class="card-title">Create Grade</h5>
    </div>
    <form action="{{ route("grade.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="reqfield" for="grade">Grade</label>
                        <input type="text" class="form-control" name="grade" id="grade" value="{{ old("grade") }}">
                        <span class="error">{{ $errors->first('grade') }}</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <a href="{{ route("grade.index") }}" class="btn btn-outline-info">Back</a>
            <button type="submit" class="btn btn-success float-right">Save</button>
        </div>
    </form>
</div>

@endsection
