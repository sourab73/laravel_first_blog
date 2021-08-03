<?php

namespace App\Http\Controllers;
use Str;
use Illuminate\Http\Request;
use DB;
class writecontroller extends Controller
{
    public function writepost()
    {
        $category = DB::table('categories')->get();
        return view('post.post', compact('category'));
    }

    
    public function storepost(Request $request)
    {
        // Validation check----------

        $validated = $request->validate([
            'title' => 'required|max:225',
            'details' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif| max:1000',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if($image)
        {
               $image_name = Str::random(5);
               $ext = strtolower($image->getClientOriginalExtension());
               $image_full_name = $image_name.'.'.$ext;
               $upload_path = 'public/frontend/image/';
               $image_url = $upload_path.$image_full_name;
               $success = $image->move($upload_path,$image_full_name);
               $data['image']=$image_url;
               DB::table('posts')->insert($data);
               return Redirect()->back()->with('info','Data insert successfully!');

        }
        else
        {
            $post = DB::table('posts')->insert($data);
            return Redirect()->back()->with('info','Data insert successfully!');
        }

        
    }

    public function allpost()
    {
       $post = DB::table('posts')
              ->join('categories','posts.category_id','categories.id')
              ->select('posts.*','categories.name')
              ->get();
       return view('post.allpost', compact('post'));
    }

    public function singleview($id)
    {
        $post = DB::table('posts')
              ->join('categories','posts.category_id','categories.id')
              ->select('posts.*','categories.name')
              ->where('posts.id',$id)
              ->first();
            //   return response()->json($post);
            return view('post.singlepost', compact('post'));
    }


    public function editpost($id)
    {
        $category = DB::table('categories')->get();
       $post = DB::table('posts')->where('id',$id)->first();
       return view('post.editpost',compact('category','post'));
    }

    public function updatepost(Request $request,$id)
    {
        $validated = $request->validate([
            'title' => 'required|max:225',
            'details' => 'required',
            'image' => 'mimes:png,jpg,jpeg,gif| max:1000',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if($image)
        {
               $image_name = Str::random(5);
               $ext = strtolower($image->getClientOriginalExtension());
               $image_full_name = $image_name.'.'.$ext;
               $upload_path = 'public/frontend/image/';
               $image_url = $upload_path.$image_full_name;
               $success = $image->move($upload_path,$image_full_name);
               $data['image']=$image_url;
               unlink($request->old_photo);
               DB::table('posts')->where('id',$id)->update($data);
               return Redirect()->route('all.post')->with('info','Data update successfully!');

        }
        else
        {

            $data['image']=$request->old_photo;
            $post = DB::table('posts')->where('id',$id)->update($data);
            return Redirect()->route('all.post')->with('info','Data update successfully!');
        }
    }

    public function deletepost($id)
    {
        $post = DB::table('posts')->where('id',$id)->first();
        $image = $post->image;
        unlink($image);
        $delete = DB::table('posts')->where('id',$id)->delete();
        return Redirect()->route('all.post')->with('info','Data Delete successfully!');

    }
}
