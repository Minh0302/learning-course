@extends('welcome')

@section('content')
<style>
    .question {
        width: 75%;
    }

    .options {
        position: relative;
        padding-left: 40px;
    }

    #options label {
        display: block;
        margin-bottom: 15px;
        font-size: 14px;
        cursor: pointer;
    }

    .options input {
        opacity: 0;
    }

    .checkmark {
        position: absolute;
        top: -1px;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #555;
        border: 1px solid #ddd;
        border-radius: 50%;
    }

    .options input:checked~.checkmark:after {
        display: block;
    }

    .options .checkmark:after {
        content: "";
        width: 10px;
        height: 10px;
        display: block;
        background: white;
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(0);
        transition: 300ms ease-in-out 0s;
    }

    .options input[type="radio"]:checked~.checkmark {
        background: #21bf73;
        transition: 300ms ease-in-out 0s;
    }

    .options input[type="radio"]:checked~.checkmark:after {
        transform: translate(-50%, -50%) scale(1);
    }

    .btn-primary {
        background-color: #555;
        color: #ddd;
        border: 1px solid #ddd;
    }

    .btn-primary:hover {
        background-color: #21bf73;
        border: 1px solid #21bf73;
    }

    .btn-success {
        padding: 5px 25px;
        background-color: #21bf73;
    }

    @media(max-width:576px) {
        .question {
            width: 100%;
            word-spacing: 2px;
        }
    }
</style>

<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url({{asset('../frontend/images/page-banner-2.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Thi</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thi</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="container mt-sm-5 my-1">
                <h3>Bài học</h3>
                @foreach($lectures as $lecture)
                <div class="py-2 h5"><a href="{{url('khoa-hoc/exam/'.Str::slug($lecture->course_id).'/'.$lecture->id.'/lecture/'.$lecture->lecture_id)}}"><b>{{$lecture->lecture_name}}</b></a></div>
                @endforeach
            </div>
        </div>
        <div class="col-md-9">
            <div class="mt-5">
                @foreach($documents as $document)
                @if(isset($document->document_video))
                <p>
                    <iframe width="700" height="400" src="https://www.youtube.com/embed/{{$document->document_video}}" frameborder="0" allowfullscreen></iframe>
                </p>
                @endif
                @if(isset($document->document_text))
                <p>{{$document->document_text}}</p>
                @endif
                @if(isset($document->document_image))
                <p><img src="{{asset('./uploads/'.$document->document_image)}}" width="500" height="300"></p>
                @endif
                @endforeach
            </div>
            <form method="post" action="{{url('exam-question')}}" id="check-exam">
                @csrf
                <div class="container mt-sm-5 my-1">
                    @php
                    $i = 1;
                    $no = 1;
                    @endphp
                    @if(isset($questions))
                    @foreach($questions as $question)
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5"><b>{{$i++}}. {{$question->question_name}}</b></div>
                            <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                                <label class="options">{{$question->option_1}}
                                    <input type="radio" value="1"  name="question_ans_{{$question->id}}">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="options">{{$question->option_2}}
                                    <input type="radio" value="2" name="question_ans_{{$question->id}}">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="options">{{$question->option_3}}
                                    <input type="radio" value="3" name="question_ans_{{$question->id}}">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="options">{{$question->option_4}}
                                    <input type="radio" value="4" name="question_ans_{{$question->id}}">
                                    <span class="checkmark"></span>
                                </label>
                                    <input type="hidden" value="{{$question->answer}}" name="answer[]">
                                    <input type="hidden" value="{{$question->lecture_id}}" name="lecture_id">
                                    <input type="hidden" value="{{$question->id}}" name="question_id[]">
                                </label>
                            </div>
                    </div>
                    <br><hr>
                    @endforeach
                    @endif
                    <div class="d-flex align-items-center pt-3">
                        <div class="ml-auto mr-sm-5">
                            <button type="submit" id="submit-exam" class="btn btn-success">Nộp bài</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection