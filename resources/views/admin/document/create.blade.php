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
                        <h5 class="card-title">Thêm tài liệu bài học</h5>

                        <!-- General Form Elements -->
                        <form method="post" action="{{route('document.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Chọn bài học</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="lecture_id">
                                        <option selected>Chọn bài học</option>
                                        @foreach($lectures as $lecture)
                                        <option value="{{$lecture->id}}">{{$lecture->lecture_name}}</option>
                                        @endforeach
                                    </select>   
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tài liệu dạng text</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="document_text"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Tài liệu dạng video</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="document_video">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Tài liệu dạng file</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="document_image">
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