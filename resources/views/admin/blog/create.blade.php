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
                        <h5 class="card-title">Thêm blog</h5>

                        <!-- General Form Elements -->
                        <form method="post" action="{{route('blog.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tiêu đề</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="blog_title" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="blog_img">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="blog_desc" required></textarea>
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