@extends('welcome')

@section('content')

    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('../frontend/images/page-banner-2.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Khoá học</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Khoá học</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== COURSES PART START ======-->
    
    <section id="courses-part" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                    <div class="row">
                        @foreach ($all_course as $course)
                        <div class="col-lg-4 col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="{{asset('./uploads/'.$course->overview_img)}}" alt="Course">
                                    </div>
                                    <div class="price">
                                        <span>Free</span>
                                    </div>
                                </div>
                                <div class="cont">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>(20 Reviws)</span><br />
                                    <a href="{{url('khoa-hoc',['slug' =>Str::slug($course->course_id),'id' =>$course->id])}}"><h4>{{$course->course_id}}</h4></a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="{{url('giao-vien',['id' =>$course->id])}}">
                                                @if(isset($course->teacher_img))
                                                <img src="{{asset('./uploads/'.$course->teacher_img)}}" alt="" width="40" height="40">
                                                @else
                                                <img src="{{asset('../teacher.jpg')}}" alt="" width="40" height="40">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="name">
                                            <a href="{{url('giao-vien',['id' =>$course->id])}}"><h6>{{$course->admin_name}}</h6></a>
                                        </div>
                                        <div class="admin">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i><span>31</span></a></li>
                                                <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                        @endforeach
                    </div> <!-- row -->
                </div>
            </div> <!-- tab content -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a href="#" aria-label="Previous">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="active" href="#">1</a></li>
                            <li class="page-item"><a href="#">2</a></li>
                            <li class="page-item"><a href="#">3</a></li>
                            <li class="page-item">
                                <a href="#" aria-label="Next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav> -->
                    <div class="mt-50">
                        {{$all_course->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>  <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== COURSES PART ENDS ======-->

@endsection