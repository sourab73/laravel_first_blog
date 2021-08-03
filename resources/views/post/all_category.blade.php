@extends('welcome')
@extends('pages.nav')
@section('content')

        <p class="container">
            <a class="btn btn-outline-warning btn-lg" href="{{route('category')}}" role="button">Category</a>
            <a class="btn btn-outline-success btn-lg" href="{{route('allcat')}}" role="button">View Category</a>
        </p> 
        <hr>
        <table class="table table-responsive">
            <tr>
                <th>Sl</th>
                <th>Category Name</th>
                <th>Slug Name</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            @foreach($category as $fetchdata)
            <tr>
                <td>{{ $fetchdata->id}}</td>
                <td>{{ $fetchdata->name}}</td>
                <td>{{ $fetchdata->slug}}</td>
                <td>{{ $fetchdata->created_at}}</td>
                
                <td>
                    <a href="{{ URL::to('edit/category/'.$fetchdata->id ) }}" class="btn btn-info">Edit</a>
                    <a href="{{ URL::to('delete/category/'.$fetchdata->id ) }}" class="btn btn-danger" id="delete">Delete</a>
                    <a href="{{ URL::to('view/category/'.$fetchdata->id ) }}" class="btn btn-warning">View</a>
                </td>
            </tr>
            @endforeach
        </table>

@endsection