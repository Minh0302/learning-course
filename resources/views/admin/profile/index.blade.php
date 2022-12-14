@extends('admin_layout')
@section('admin_content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{asset('./uploads/'.$profile->teacher_img)}}" alt="Profile" class="rounded-circle">
                        <h2>{{$profile->admin_name}}</h2>
                        <h3>Teacher</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">H??? - T??n</div>
                                    <div class="col-lg-9 col-md-8">{{$profile->admin_name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{$profile->admin_email}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">S??T</div>
                                    <div class="col-lg-9 col-md-8">{{$profile->admin_phone}}</div>
                                </div>

                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic">{{$profile->about}}</p>
                                <h5 class="card-title">Th??nh t???u</h5>
                                <p class="small fst-italic">{{$profile->achievements}}</p>
                                <h5 class="card-title">M???c ti??u ngh??? nghi???p</h5>
                                <p class="small fst-italic">{{$profile->objectives}}</p>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="post" action="{{url('/update-profile')}}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{asset('./uploads/'.$profile->teacher_img)}}" alt="Profile" width="100" height="100">
                                            <input type="file" class="form-control" name="teacher_img" value="{{asset('./uploads/'.$profile->teacher_img)}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea type="text" name="about" class="form-control" style="height: 100px">{{$profile->about}}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="achievements" class="col-md-4 col-lg-3 col-form-label">Th??nh t???u</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea type="text" name="achievements" class="form-control" style="height: 100px">{{$profile->achievements}}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="objectives" class="col-md-4 col-lg-3 col-form-label">M???c ti??u ngh??? nghi???p</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea type="text" name="objectives" class="form-control" style="height: 100px">{{$profile->objectives}}</textarea>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">L??u</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection