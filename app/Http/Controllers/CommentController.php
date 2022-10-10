<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function comment_teacher(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->student_name = $data['student_name'];
        $comment->note = $data['note'];
        $comment->date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $comment->teacher_id = $data['teacher_id'];
        $comment->save();
        Toastr::success('Thêm khoá học thành công!', 'Thành công');
        return redirect()->back(); 
    }
}
