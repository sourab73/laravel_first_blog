@extends('pages.nav')

@extends('welcome')
@section('content')


<div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                    @foreach($post as $row)
                    <div class="post-preview">
                        <a href="">
                            <img src="{{URL::to($row->image)}}" style="height:300px;">
                            <h2 class="post-title">{{$row->title}}</h2>
                        </a>
                        <p class="post-meta">
                            Category
                            <a href="#!">{{ $row->name }}</a>
                            on slug {{$row->slug}}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                   @endforeach
                   
                   
                   
                </div>
                <span>
                {{$post->links()}}
                </span>
                
</div>
<style>
    .w-5{
        display:none;
    }
</style>



@endsection
