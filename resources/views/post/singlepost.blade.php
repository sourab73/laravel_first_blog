@extends('welcome')
@extends('pages.nav')
@section('content')
    
<div class="col-lg-8 col-md-10 mx-auto">
       
      
        <div class="container">
               <h3>{{$post->title}}</h3>
               <img src="{{ URL::to($post->image)}}" height="340px" >
               <p>Category Name:{{$post->name}}</p>
               <p>{{$post->details}}</p>
        </div> 
</div>
@endsection