@extends('layouts.default')
@section('title',"Grade")
@section('content')
<div class="card card-pink card-outline">
    <div class="card-header">
        <h5 class="card-title">Delete Grade</h5>
    </div>
    <form action="{{ route("grade.destroy",request()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <fieldset disabled>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="reqfield" for="grade">Grade</label>
                            <input type="text" class="form-control" name="grade" id="grade"
                                value="{{ old("grade",$grade->grade) }}">
                            <span class="error">{{ $errors->first('grade') }}</span>
                        </div>
                    </div>

                </div>

            </div>
        </fieldset>
        <div class="card-footer">
            <a href="{{ route("grade.index") }}" class="btn btn-outline-info">Back</a>
            <button class="btn btn-danger float-right">Delete</button>
        </div>
    </form>
</div>

@endsection
