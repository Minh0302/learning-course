<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecture;
use Brian2694\Toastr\Facades\Toastr;
use Session;
use Auth;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures = Lecture::where('teacher_id', Auth::user()->id)->get();
        return view('admin.lecture.index')->with(compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lecture.create');
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
            'lecture_name' => 'required',
            'lecture_desc' => 'required'
        ]);
        $lecture = new Lecture();
        $lecture->lecture_name = $data['lecture_name'];
        $lecture->lecture_desc = $data['lecture_desc'];
        $lecture->teacher_id = Auth::user()->id;
        $lecture->save();
        Toastr::success('Thêm bài học thành công!', 'Thành công');
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
        $lecture = Lecture::find($id);
        return view('admin.lecture.edit')->with(compact('lecture'));
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
            'lecture_name' => 'required',
            'lecture_desc' => 'required'
        ]);
        $lecture = Lecture::find($id);
        $lecture->lecture_name = $data['lecture_name'];
        $lecture->lecture_desc = $data['lecture_desc'];
        $lecture->teacher_id = Auth::user()->id;
        $lecture->save();
        Toastr::success('Update bài học thành công!', 'Thành công');
        return redirect()->route('lecture.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lecture::find($id)->delete();
        Toastr::success('Xoá bài học thành công!', 'Thành công');
        return redirect()->back();
    }
}
