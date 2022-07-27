<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function blog()
    {
        $data = Blog::all();
        return view('blog', compact('data'));
    }

    public function blog_detail($id)
    {
        $data = Blog::find($id);
        $previous = Blog::where('id', '<', $data->id)->orderBy('id','desc')->first();
        $next = Blog::where('id', '>', $data->id)->orderBy('id')->first();
        return view('blog-details', compact('data',  'previous', 'next'));
    }

    public function addblogpage()
    {
        if(Auth::id())
        {
         if(Auth::user()->usertype=='1')
         {
            return view('admin.blog.addblog');
         }
         else
         {
            return redirect()->back();
         }
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function addnewblog(Request $request)
    {
        $data=new Blog;

        

         $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename=time() .'.'. $extension;
        $image->move('uploads/product/',$filename);
        $data->image = $filename;        

        $data->blog_title=$request->blog_title;
        $data->blog_author=$request->blog_author;
        $data->blog_date=$request->blog_date;
        $data->blog_content=$request->blog_content;
        $data->blog_tags=$request->blog_tags;
        $data->save();
        return redirect()->back()->with('success', 'Blog Added Succesfully');
   }

   public function showblog()
   {
    if(Auth::id())
    {
     if(Auth::user()->usertype=='1')
     {
         $data = Blog::all();
         return view('admin.blog.showblog', compact('data'));
     }
     else
     {
        return redirect()->back();
     }
    }
    else
    {
        return redirect('login');
    }
    
   }

   public function update_page($id)
   {
        $data = Blog::find($id);
        return view('admin.blog.update_blog_view', compact('data'));
   }
   
   public function updateblog(Request $request, $id)
   {
      $data = Blog::find($id);   
      if($request->image){
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename=time() .'.'. $extension;
        $image->move('uploads/product/',$filename);
        $data->image = $filename;                   
       }       

      $data->blog_title=$request->blog_title;
      $data->blog_author=$request->blog_author;
      $data->blog_date=$request->blog_date;
      $data->blog_content=$request->blog_content;
      $data->blog_tags=$request->blog_tags;
      $data->save();
      return redirect()->back()->with('success', 'Blog Updated Succesfully');
   }

   public function deleteblog($id)
   {
        $data = Blog::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Blog Deleted Successfully');
   }
}
