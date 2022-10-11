@extends('pages.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Content Management System</h2>
            </div>
            <br/>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pages.create') }}"> Create New user</a>
            </div>
            <br/>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pages as $page)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $page->title }}</td>
            <td>{{ substr($page->content,0,100) }}</td>
            <td>
                <form action="{{ route('pages.destroy',$page->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('pages.show',$page->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('pages.edit',$page->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $pages->links() !!}
      
@endsection