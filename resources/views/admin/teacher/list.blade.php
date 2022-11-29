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
                        <h5 class="card-title">Danh sách giáo viên</h5>

                        <!-- Table with stripped rows -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên giáo viên</th>
                                    <th scope="col">Khoá học</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($teacher as $key => $user)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$user->admin->admin_name}}</td>
                                    <td>
                                        {{$user->course_id }}
                                    </td>
                                    <td>
                                        <a href="{{url('admin/giao-vien/chi-tiet',[$user->teacher_id])}}" class="active styling_edit" ui-toggle-class=""><i class="fa fa-eye text-success text-active" style="font-size: 25px"></i></a>
                                    </td>
                                </tr>
                                @endforeach
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