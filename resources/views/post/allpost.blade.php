@extends('welcome')
@extends('pages.nav')
@section('content')

        <p class="container">
            
            <a class="btn btn-outline-success btn-lg" href="{{route('writepost')}}" role="button">Write Post</a>
        </p> 
        <hr>
        <table class="table table-responsive">
            <tr>
                <th>Sl</th>
                <th>Category</th>
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach($post as $fetchdata)
            <tr>
                <td>{{ $fetchdata->id}}</td>
                <td>{{ $fetchdata->name}}</td>
                <td>{{ $fetchdata->title}}</td>
                <td><img src="{{ URL::to($fetchdata->image )}}" style=" height: 40px; width: 70px;"/></td>
                
                <td>
                    <a href="{{ URL::to('edit/post/'.$fetchdata->id ) }}" class="btn btn-info">Edit</a>
                    <a href="{{ URL::to('delete/post/'.$fetchdata->id ) }}" class="btn btn-danger" id="delete">Delete</a>
                    <a href="{{ URL::to('view/post/'.$fetchdata->id ) }}" class="btn btn-warning">View</a>
                </td>
            </tr>
            @endforeach
        </table>

@endsection