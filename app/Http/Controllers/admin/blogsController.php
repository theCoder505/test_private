<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class blogsController extends Controller
{



    public function showBlogPage()
    {
        $allblogs = DB::table('blogs')->orderByDesc('sno')->get();
        $all_cats = DB::table('categories')->where('cat_type', 'blog')->get();
        return view('admin.adminpages.blogpage', compact('allblogs', 'all_cats'));
    }



    public function showParticularBlog($blog_serial)
    {
        $spec_blog = DB::table('blogs')->where('sno', $blog_serial)->get();
        $all_cats = DB::table('categories')->where('cat_type', 'blog')->get();
        return view('admin.adminpages.spec_blog_page', compact('spec_blog', 'all_cats'));
    }





    

    public function addNewBlogItem(Request $request)
    {
        $req_blog_title = $request['blog_title'];
        $req_blog_category = $request['blog_category'];
        $req_blog_description = $request['blog_description'];

        if ($file = $request->file('blog_image')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/blogs/';
            $blog_img_url = '/website/blogs/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        }


        $insert = DB::table('blogs')->insert([
            'blog_image' => $blog_img_url,
            'blog_title' => $req_blog_title,
            'blog_category' => $req_blog_category,
            'blog_description' => $req_blog_description,
        ]);


        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Blog added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not add! Try later.')->with('type', 'alert-danger');
        }
    }













    public function updateExistingBlogItem(Request $request)
    {
        $blog_sno = $request['blog_serial'];
        $req_blog_title = $request['blog_title'];
        $req_blog_category = $request['blog_category'];
        $req_blog_description = $request['blog_description'];

        if ($file = $request->file('blog_image')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/blogs/';
            $blog_img_url = '/website/blogs/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $blog_img_url = DB::table('blogs')->where('sno', $blog_sno)->value('blog_image');
        }


        $update = DB::table('blogs')->where('sno', $blog_sno)->update([
            'blog_image' => $blog_img_url,
            'blog_title' => $req_blog_title,
            'blog_category' => $req_blog_category,
            'blog_description' => $req_blog_description,
        ]);


        if ($update) {
            return Redirect::back()->with('alertMsg', 'Blog Updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }










    public function deleteExistingBlogItem($blog_serial)
    {
        $delete = DB::table('blogs')->where('sno', $blog_serial)->delete();

        if ($delete) {
            return Redirect::back()->with('alertMsg', 'Blog deleted successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not delete! Try later.')->with('type', 'alert-danger');
        }
    }
    //
}
