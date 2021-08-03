<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class category extends Controller
{
    public function create()
    {
        return view('post.category');
    }

    public function storeCategory(Request $request)
    {
        // Validation check----------

           $validated = $request->validate([
            'name' => 'required|unique:categories|max:255|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);
    
         //end validation-----  

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $category = DB::table('categories')->insert($data);
        // return response()->json($data);
        if ($category) {
            
            return Redirect()->route('allcat')->with('info','You added new items, follow next step!');
        } else {
            
            return Redirect()->back()->with('warning','You added new items, follow next step!');
        }
        
    }
// all data view technique-------------using compact()
    public function allCategory()
    {
        $category = DB::table('categories')->get();
        return view('post.all_category',compact('category'));
    }

    //single data view process-------------using with()
    public function singleview($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('post.singlecat')->with('category', $category);
    }


    public function deletecat($id)
    {
        $delete = DB::table('categories')->where('id', $id)->delete();
        if ($delete) {
            
            return Redirect()->back()->with('info','Delete Successfully!');
        } else {
            
            return Redirect()->back()->with('warning','Something Wrong!');
        }

    }

    public function Editcat($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('post.editcat', compact('category'));
    }

    public function updatecat(Request $request ,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|min:4',
            'slug' => 'required|max:25|min:4',
        ]);
    
         //end validation-----  

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $category = DB::table('categories')->where('id', $id)->update($data);
        // return response()->json($data);
        if ($category) {
            
            return Redirect()->route('allcat')->with('info','Updated successfully!');
        } else {
            
            return Redirect()->back()->with('warning','Som.ething went wrong!');
        }
        
    }

}
