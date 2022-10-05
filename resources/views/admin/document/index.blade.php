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
                                    <th scope="col">Tài liệu dạng text</th>
                                    <th scope="col">Tài liệu dạng video</th>
                                    <th scope="col">Tài liệu dạng file</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($documents as $document)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$document->lecture_name}}</td>
                                    <td>
                                        @if(isset($document->document_text))
                                            {{$document->document_text}}
                                        @else
                                            Không có
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($document->document_video))
                                        <iframe width="300" height="250" src="https://www.youtube.com/embed/{{$document->document_video}}" frameborder="0" allowfullscreen></iframe>
                                        @else
                                            Không có
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($document->document_image))
                                        <img src="{{asset('./uploads/'.$document->document_image)}}" width="100" height="100">
                                        @else
                                            Không có
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{route('document.edit',[$document->id])}}" class="active styling_edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active" style="font-size: 25px"></i></a>
                                    <form action="{{route('document.destroy',[$document->id])}}" method="POST">
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