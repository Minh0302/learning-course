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
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tóm tắt</th>
                                    <th scope="col">Yêu cầu khoá học</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($overviews as $overview)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td><img src="{{asset('./uploads/'.$overview->overview_img)}}" width="100" height="100"></td>
                                    <td>{{$overview->summary}}</td>
                                    <td>{{$overview->requirement}}</td>
                                    <td>
                                    <a href="{{route('overview.edit',[$overview->id])}}" class="active styling_edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active" style="font-size: 25px"></i></a>
                                    <form action="{{route('overview.destroy',[$overview->id])}}" method="POST">
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