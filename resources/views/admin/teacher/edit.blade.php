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
                        <h5 class="card-title">Thông tin giáo viên</h5>

                        <!-- Table with stripped rows -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tên giáo viên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">SĐT</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">About</th>
                                    <th scope="col">Thành tựu</th>
                                    <th scope="col">Mục tiêu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$detail->admin_name}}</td>
                                    <td>{{$detail->admin_email}}</td>
                                    <td>{{$detail->admin_phone}}</td>
                                    <td>
                                        @if(isset($detail->teacher_img))
                                        <img src="{{asset('./uploads/'.$detail->teacher_img)}}" alt="Profile" width="100" height="100">
                                        @else
                                        Không có hình ảnh
                                        @endif
                                    </td>
                                    <td>{{$detail->about}}</td>
                                    <td>{{$detail->achievements}}</td>
                                    <td>{{$detail->objectives}}</td>
                                </tr>
                                </form>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thông tin Khoá học</h5>

                        <!-- Table with stripped rows -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">HÌnh ảnh</th>
                                    <th scope="col">Tóm tắt khoá học</th>
                                    <th scope="col">Yêu cầu khoá học</th>
                                    <th scope="col">Tên bài học</th>
                                    <th scope="col">Số câu hỏi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if(isset($overview->overview_img))
                                        <img src="{{asset('./uploads/'.$overview->overview_img)}}" alt="Profile" width="100" height="100">
                                        @else
                                        Không có hình ảnh
                                        @endif
                                    </td>
                                    <td>{{$overview->summary}}</td>
                                    <td>{{$overview->requirement}}</td>
                                    <td>
                                        @if(count($lectures) > 0)
                                            @foreach($lectures as $lecture)
                                            <i class='fa fa-circle'></i> {{$lecture->lecture_name}} <br>
                                            @endforeach
                                        @else
                                            Chưa có bài học nào
                                        @endif
                                    </td>
                                    <td>{{$question_count->question}}</td>
                                </tr>
                                </form>
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