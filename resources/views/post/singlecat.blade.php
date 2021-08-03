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
            </tr>
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->created_at }}</td>
            </tr>
           
        </table>

@endsection