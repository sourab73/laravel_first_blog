@extends('welcome')
@extends('pages.nav')
@section('content')

        <p class="container">
            <a class="btn btn-outline-warning btn-lg" href="{{route('category')}}" role="button">Category</a>
            <a class="btn btn-outline-success btn-lg" href="{{route('allcat')}}" role="button">View Category</a>
            <a class="btn btn-outline-warning btn-lg" href="{{route('all.post')}}" role="button">All Posts</a>
        </p> 
        <hr>
        @if ($errors->any())
              <div class="alert alert-danger">
                     <ul>
                     @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                     @endforeach
                     </ul>
              </div>
              @endif  
        <form method="post" action="{{route('store.post')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Post Title</label>
        <input type="text" class="form-control" name="title" placeholder="Post title" name="title">
        </div>


        <div class="mb-3">
             <label for="exampleFormControlInput1" class="form-label">Category</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                        <option>Select One</option>
                       @foreach($category as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                       @endforeach
                </select>
        </div>


        <div class="mb-3">
        <label for="formFileLg" class="form-label">Upoload Post Image</label>
        <input class="form-control form-control-lg" id="formFileLg" type="file" name="image">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="details"></textarea>
        </div>
        <input class="btn btn-outline-warning btn-lg"  type="submit"/>
        </form>

@endsection