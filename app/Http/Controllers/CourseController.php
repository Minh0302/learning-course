<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Brian2694\Toastr\Facades\Toastr;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::orderBy('id','ASC')->get();
        return view('admin.courses.index')->with(compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'course_name' => 'required|max:255',
            'course_slug' => 'required',
            'course_desc' => 'nullable',
            'course_status' => 'required',
        ]);
        $courses = new Courses();
        $courses->course_name = $data['course_name'];
        $courses->course_slug = $data['course_slug'];
        $courses->course_desc = $data['course_desc'];
        $courses->course_status = $data['course_status'];
        $courses->save();
        Toastr::success('Thêm khoá học thành công!', 'Thành công');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Courses::find($id);
        return view('admin.courses.edit')->with(compact('course'));
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
        $data = $request->validate([
            'course_name' => 'required|max:255',
            'course_slug' => 'required',
            'course_desc' => 'nullable',
            'course_status' => 'required',
        ]);
        $courses = Courses::find($id);
        $courses->course_name = $data['course_name'];
        $courses->course_slug = $data['course_slug'];
        $courses->course_desc = $data['course_desc'];
        $courses->course_status = $data['course_status'];
        $courses->save();
        Toastr::success('Chỉnh sửa khoá học thành công!', 'Thành công');
        return redirect()->route('courses.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Courses::find($id)->delete();
        Toastr::success('Xoá khoá học thành công!', 'Thành công');
        return redirect()->back();
    }
}
