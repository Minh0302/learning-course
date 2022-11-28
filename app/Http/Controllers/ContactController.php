<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\TeacherContact;

class ContactController extends Controller
{
    public function show_contact(){
        return view('pages.contact.show_contact');
    }
    public function save_contact(Request $request){
        $data = $request->all();
        $contact = new Contact();
        $contact->student_name = $data['student_name'];
        $contact->student_email = $data['student_email'];
        $contact->contact_subject = $data['contact_subject'];
        $contact->contact_phone = $data['contact_phone'];
        $contact->contact_note = $data['contact_note'];
        $contact->save();
        Toastr::success('Thêm góp ý thành công!', 'Thành công');
        return redirect()->back(); 
    }
    public function all_contact(){
        $contacts = Contact::orderBy('id','desc')->get();
        return view('admin.contact.index')->with(compact('contacts'));
    }
    public function teacher_contact(){
        return view('admin.contact.teacher_contact');
    }
    public function save_teacher_contact(Request $request){
        $data = $request->all();
        $contact = new TeacherContact();
        $contact->teacher_name = $data['teacher_name'];
        $contact->teacher_email = $data['teacher_email'];
        $contact->teacher_subject = $data['teacher_subject'];
        $contact->teacher_desc = $data['teacher_desc'];
        $contact->save();
        Toastr::success('Thêm góp ý thành công!', 'Thành công');
        return redirect()->back(); 
    }
    public function all_contact_teacher(){
        $contacts = TeacherContact::orderBy('id','desc')->get();
        return view('admin.contact.show_contact_teacher')->with(compact('contacts'));
    }
}
