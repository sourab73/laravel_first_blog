<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HelloController extends Controller
{
    public function index()
    {
        $post = DB::table('posts')->join('categories','posts.category_id','categories.id')
                ->select('posts.*','categories.name','categories.slug')->paginate(2);
        return view('pages.index', compact('post'));
    }

    public function singleview($id)
    {
        $post = DB::table('posts')->where('id',$id)->first();
              
            //   return response()->json($post);
            return view('post.singlepost', compact('post'));
    }
    public function about()
    {
        return view('pages.about');
    }

    public function contactus()
    {
        return view('pages.contact');
    }
}
