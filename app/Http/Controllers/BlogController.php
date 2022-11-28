<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Session;
use Auth;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = DB::table('admin')
        ->select('admin.admin_name','blog.id','blog.blog_title','blog.blog_img','blog.blog_date','blog.blog_desc')
        ->join('blog','blog.teacher_id','=','admin.id')
        ->where('admin.id',Auth::user()->id)->get();
        return view('admin.blog.index')->with(compact('blogs'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $blog = new Blog();
        $blog->teacher_id = Auth::user()->id;
        $blog->blog_title = $data['blog_title'];
        $blog->blog_desc = $data['blog_desc'];
        $blog->blog_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');

        $get_image = $request->file('blog_img');
        $path = 'uploads/';
        $get_image_name = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_image_name));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image -> move($path,$new_image);

        $blog->blog_img = $new_image; 
        $blog->save();
        Toastr::success('Thêm blog thành công!', 'Thành công');
        return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $blogs = DB::table('admin')
        // ->select('admin.admin_name','blog.id','blog.blog_title','blog.blog_img','blog.blog_date','blog.blog_desc')
        // ->join('blog','blog.teacher_id','=','admin.id')
        // ->where('admin.id',Auth::user()->id)->get();
        $blog = Blog::find($id);
        return view('admin.blog.edit')->with(compact('blog'));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $blog = Blog::find($id);
        $blog->teacher_id = Auth::user()->id;
        $blog->blog_title = $data['blog_title'];
        $blog->blog_desc = $data['blog_desc'];
        $blog->blog_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');

        $get_image = $request->file('blog_img');
        if(isset($get_image)){
            $path = 'uploads/';
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_image_name));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move($path,$new_image);

            $blog->blog_img = $new_image;    
        }
        $blog->save();
        Toastr::success('Update blog thành công!', 'Thành công');
        return redirect()->route('blog.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        Toastr::success('Xoá blog thành công!', 'Thành công');
        return redirect()->back();
    }
}
