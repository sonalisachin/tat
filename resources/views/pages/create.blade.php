@extends('pages.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Page</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pages.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('pages.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select Main Page:</strong>
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <select name="parent_id">
                    <option value="">Select Page Main</option>
                    @if(!empty($results) && sizeof($results) > 0)
                        @foreach($results as $result)
                            <option value="{{ $result->id }}" >{{ ucfirst($result->title) }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content:</strong>
                <textarea class="form-control" style="height:150px" name="content" placeholder="Content"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center"><br/>
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection