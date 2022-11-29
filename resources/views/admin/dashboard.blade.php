@extends('admin_layout')
@section('admin_content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Giáo viên</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$count_teacher}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Học Sinh</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$count_student}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-xl-6">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Góp ý</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-envelope-open"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$count_contact}}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-xl-6">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Blog</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-pen"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$count_blog}}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Thống kê học sinh</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Học sinh</th>
                                            <th scope="col">Khoá học</th>
                                            <th scope="col">Bài học</th>
                                            <!-- <th scope="col">Số lần thi</th> -->
                                            <!-- <th scope="col">Số câu đúng</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @hasrole(['author'])
                                        @foreach($students as $student)
                                        <tr>
                                            <th scope="row"><a href="#">{{$student->id}}</a></th>
                                            <td>{{$student->customer_name}}</td>
                                            <td>{{$student->course_id}}</td>
                                            <td><a href="#" class="text-primary">{{$student->lecture_name}}</a></td>
                                            <!-- <td></td> -->
                                            <!-- <td><span class="badge bg-success">Approved</span></td> -->
                                        </tr>
                                        @endforeach
                                        @endhasrole
                                        @hasrole(['admin'])
                                        @foreach($students_admin as $admin)
                                        <tr>
                                            <th scope="row"><a href="#">{{$admin->id}}</a></th>
                                            <td>{{$admin->customer_name}}</td>
                                            <td>{{$admin->course_id}}</td>
                                            <td><a href="#" class="text-primary">{{$admin->lecture_name}}</a></td>
                                            <!-- <td></td> -->
                                            <!-- <td><span class="badge bg-success">Approved</span></td> -->
                                        </tr>
                                        @endforeach
                                        @endhasrole
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->
@endsection