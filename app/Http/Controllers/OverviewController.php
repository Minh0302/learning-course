<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Overview;
use Brian2694\Toastr\Facades\Toastr;
use Session;
use Auth;

class OverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $overviews = Overview::where('teacher_id', Auth::user()->id)->get();
        return view('admin.overview.index')->with(compact('overviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.overview.create');
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
            'summary' => 'required',
            'requirement' => 'required',
            'overview_img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000'
        ]);
        $overview = new Overview();
        $overview->summary = $data['summary'];
        $overview->requirement = $data['requirement'];
        $overview->teacher_id = Auth::user()->id;

        $get_image = $request->file('overview_img');
        $path = 'uploads/';
        $get_image_name = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_image_name));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image -> move($path,$new_image);

        $overview->overview_img = $new_image; 
        $overview->save();
        Toastr::success('Thêm tổng quát khoá học thành công!', 'Thành công');
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
        $overview = Overview::find($id);
        return view('admin.overview.edit')->with(compact('overview'));
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
            'summary' => 'required',
            'requirement' => 'required',
            'overview_img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000'
        ]);
        $overview = Overview::find($id);
        $overview->summary = $data['summary'];
        $overview->requirement = $data['requirement'];
        $overview->teacher_id = Auth::user()->id;
        
        $get_image = $request->file('overview_img');
        if(isset($get_image)){
            $path = 'uploads/';
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_image_name));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move($path,$new_image);

            $overview->overview_img = $new_image;    
        }


        $overview->save();
        Toastr::success('Update tổng quát khoá học thành công!', 'Thành công');
        return redirect()->route('overview.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Overview::find($id)->delete();
        Toastr::success('Xoá tổng quát khoá học thành công!', 'Thành công');
        return redirect()->back();
    }
}
