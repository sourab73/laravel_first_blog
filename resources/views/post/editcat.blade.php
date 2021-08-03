@extends('welcome')
@extends('pages.nav')
@section('content')

       <div class="container">
              @if ($errors->any())
              <div class="alert alert-danger">
                     <ul>
                     @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                     @endforeach
                     </ul>
              </div>
              @endif
            <form method="post" action="{{url('update/category/' .$category->id)}}">
                   @csrf 
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Slug Name</label>
                <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                </div>
                <input class="btn btn-outline-warning btn-lg" value="update"  type="submit"/>
                </form>
       </div>
    

@endsection