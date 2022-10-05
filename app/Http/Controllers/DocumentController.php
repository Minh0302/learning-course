<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Overview;
use App\Models\Lecture;
use App\Models\Document;
use Brian2694\Toastr\Facades\Toastr;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = DB::table('document_course')
        ->select('document_course.id','lecture_course.lecture_name','document_course.document_text','document_course.document_video','document_course.document_image')
        ->leftjoin('lecture_course','lecture_course.id','=','document_course.lecture_id')
        ->where('lecture_course.teacher_id',Auth::user()->id)->get();
        return view('admin.document.index')->with(compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lectures = Lecture::where('teacher_id', Auth::user()->id)->get();
        return view('admin.document.create')->with(compact('lectures'));
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
            'lecture_id' => 'required',
            'document_text' => 'nullable',
            'document_video' => 'nullable',
            'document_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000'
        ]);
        $document = new Document();
        $document->lecture_id = $data['lecture_id'];
        if(isset($data['document_text'])){
            $document->document_text = $data['document_text'];
        }
        if(isset($data['document_video'])){
            $document->document_video = $data['document_video'];
        }
        
        // image
        $get_image = $request->file('document_image');
        if(isset($get_image)){
            $path = 'uploads/';
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_image_name));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move($path,$new_image);

            $document->document_image = $new_image; 
        }
        $document->save();
        Toastr::success('Thêm tài liệu khoá học thành công!', 'Thành công');
        return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @returndocument \Illuminate\Http\Response
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
        $document = Document::find($id);
        $lectures = Lecture::where('teacher_id', Auth::user()->id)->get();
        return view('admin.document.edit')->with(compact('document','lectures'));
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
            'lecture_id' => 'required',
            'document_text' => 'nullable',
            'document_video' => 'nullable',
            'document_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000'
        ]);
        $document = Document::find($id);
        $document->lecture_id = $data['lecture_id'];
        if(isset($data['document_text'])){
            $document->document_text = $data['document_text'];
        }
        if(isset($data['document_video'])){
            $document->document_video = $data['document_video'];
        }
        
        // image
        $get_image = $request->file('document_image');
        if(isset($get_image)){
            $path = 'uploads/';
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_image_name));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move($path,$new_image);

            $document->document_image = $new_image;    
        }
        $document->save();
        Toastr::success('Update tài liệu khoá học thành công!', 'Thành công');
        return redirect()->route('document.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
