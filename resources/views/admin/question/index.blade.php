@extends('admin_layout')
@section('admin_content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>
                        <!-- Table with stripped rows -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên bài học</th>
                                    <th scope="col">Câu hỏi</th>
                                    <th scope="col">Option 1</th>
                                    <th scope="col">Option 2</th>
                                    <th scope="col">Option 3</th>
                                    <th scope="col">Option 4</th>
                                    <th scope="col">Câu trả lời</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($questions as $question)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$question->lecture_name}}</td>
                                    <td>{{$question->question_name}}</td>
                                    <td>{{$question->option_1}}</td>
                                    <td>{{$question->option_2}}</td>
                                    <td>{{$question->option_3}}</td>
                                    <td>{{$question->option_4}}</td>
                                    <td>Option {{$question->answer}}</td>
                                    <td>{{$question->question_desc}}</td>
                                    <td>
                                    <a href="{{route('question.edit',[$question->id])}}" class="active styling_edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active" style="font-size: 25px"></i></a>
                                    <form action="{{route('question.destroy',[$question->id])}}" method="POST">
                                        @method('DELETE')    
                                        @csrf
                                        <button class="active" onclick="return confirm('Are you sure to delete?')" style="font-size: 10px; width: 27px;"><i class="fa fa-times text-danger text" style="font-size: 15px"></i></button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection