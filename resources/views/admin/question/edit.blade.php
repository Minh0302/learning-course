@extends('admin_layout')
@section('admin_content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Khoá học</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Elements</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-2">
            </div>

            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Chỉnh sửa câu hỏi</h5>

                        <!-- General Form Elements -->
                        <form method="post" action="{{route('question.update',[$question->id])}}">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Chọn bài học</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="lecture_id">
                                        <option selected>Chọn bài học</option>
                                        @foreach($lectures as $key => $lecture)
                                            @if($lecture->id == $question->lecture_id)
                                                <option selected value="{{$lecture->id}}">{{$lecture->lecture_name}}</option>
                                            @else
                                                <option value="{{$lecture->id}}">{{$lecture->lecture_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>   
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Câu hỏi</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="question_name" required>{{$question->question_name}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Option 1</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="option_1" required>{{$question->option_1}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Option 2</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="option_2" required>{{$question->option_2}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Option 3</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="option_3" required>{{$question->option_3}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Option 4</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="option_4" required>{{$question->option_4}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Câu trả lời</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="answer">
                                        <option selected>Chọn câu trả lời</option>
                                        @if($question->answer==1)
                                            <option value="1" selected>Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                            <option value="4">Option 4</option>
                                        @elseif($question->answer==2)
                                            <option value="1">Option 1</option>
                                            <option value="2" selected>Option 2</option>
                                            <option value="3">Option 3</option>
                                            <option value="4">Option 4</option>
                                        @elseif($question->answer==3)
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3" selected>Option 3</option>
                                            <option value="4">Option 4</option>
                                        @elseif($question->answer==4)
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                            <option value="4" selected>Option 4</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Giải thích</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="question_desc">{{$question->question_desc}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

            <div class="col-lg-2">
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection