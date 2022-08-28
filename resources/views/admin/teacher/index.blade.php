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
                        <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

                        <!-- Table with stripped rows -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên giáo viên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Khoá học</th>
                                    <th scope="col">Admin</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">User</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                $i=1;
                                @endphp 
                                @foreach($admin as $key => $user)
                                <form method="post" action="{{url('assign-roles')}}">
                                    @csrf
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$user->admin_name}}</td>
                                        <td>
                                            {{$user->admin_email}}
                                            <input type="hidden" name="admin_email" value="{{$user->admin_email}}">
                                        </td>
                                        <td>{{$user->admin_phone}}</td>
                                        <td>Toan</td>
                                        <td><input type="checkbox" name="admin_role" {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                                        <td><input type="checkbox" name="author_role" {{$user->hasRole('author') ? 'checked' : ''}}></td>
                                        <td>
                                        <input type="submit" value="Assign roles" class="btn btn-sm btn-secondary">
                                        </td>
                                    </tr>
                                </form>
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