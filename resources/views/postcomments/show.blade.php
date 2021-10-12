@extends('layouts.default')
@section('title',"Post Comments")
@section('content')
<div class="card card-pink card-outline">
    <div class="card-header">
        <h5 class="card-title">Post Comment</h5>
    </div>
    <fieldset disabled>
        <div class="card-body">
            <div class="row">

                
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="reqfield" for="description">Comment</label>
                        <textarea name="description" id="description"
                            class="form-control">{{ $postcomments->comment }}</textarea>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="reqfield" for="status">Status</label>
                        <select name="status" id="status" class="custom-select">
                            @foreach (config('comvals.ad_status',[]) as $ky => $item)
                            <option {{ old("status",$postcomments->status)==$ky?"selected":"" }} value="{{$ky}}">
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
        <a href="{{ route("postcomment.index") }}" class="btn btn-outline-info">Back</a>
    </div>
</div>

@endsection
