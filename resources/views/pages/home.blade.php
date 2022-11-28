@extends('welcome')

@section('slide')
@include('pages.slide')
@endsection

@section('content')
<!--====== SLIDER PART ENDS ======-->

<!--====== CATEGORY PART START ======-->

<section id="category-part">
    <div class="container">
        <div class="category pt-40 pb-80">
            <div class="row">
                <div class="col-lg-4">
                    <div class="category-text pt-40">
                        <h2>Best platform to learn everything</h2>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                    <div class="row category-slied mt-40">
                        <div class="col-lg-4">
                            <a href="#">
                                <span class="singel-category text-center color-1">
                                    <span class="icon">
                                        <img src="frontend/images/all-icon/ctg-1.png" alt="Icon">
                                    </span>
                                    <span class="cont">
                                        <span>Language</span>
                                    </span>
                                </span> <!-- singel category -->
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#">
                                <span class="singel-category text-center color-2">
                                    <span class="icon">
                                        <img src="frontend/images/all-icon/ctg-2.png" alt="Icon">
                                    </span>
                                    <span class="cont">
                                        <span>Business</span>
                                    </span>
                                </span> <!-- singel category -->
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#">
                                <span class="singel-category text-center color-3">
                                    <span class="icon">
                                        <img src="frontend/images/all-icon/ctg-3.png" alt="Icon">
                                    </span>
                                    <span class="cont">
                                        <span>Literature</span>
                                    </span>
                                </span> <!-- singel category -->
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#">
                                <span class="singel-category text-center color-1">
                                    <span class="icon">
                                        <img src="frontend/images/all-icon/ctg-1.png" alt="Icon">
                                    </span>
                                    <span class="cont">
                                        <span>Language</span>
                                    </span>
                                </span> <!-- singel category -->
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#">
                                <span class="singel-category text-center color-2">
                                    <span class="icon">
                                        <img src="frontend/images/all-icon/ctg-2.png" alt="Icon">
                                    </span>
                                    <span class="cont">
                                        <span>Business</span>
                                    </span>
                                </span> <!-- singel category -->
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#">
                                <span class="singel-category text-center color-3">
                                    <span class="icon">
                                        <img src="frontend/images/all-icon/ctg-3.png" alt="Icon">
                                    </span>
                                    <span class="cont">
                                        <span>Literature</span>
                                    </span>
                                </span> <!-- singel category -->
                            </a>
                        </div>
                    </div> <!-- category slied -->
                </div>
            </div> <!-- row -->
        </div> <!-- category -->
    </div> <!-- container -->
</section>

<!--====== CATEGORY PART ENDS ======-->

<!--====== COURSE PART START ======-->

<section id="course-part" class="pt-115 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-45">
                    <h5>Khoá học chúng tôi</h5>
                    <h2>Khoá học nổi bật </h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row course-slied mt-30">
            @foreach ($courses as $course)
            <div class="col-lg-4">
                <div class="singel-course">
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
                        <span>(20 Reviws)</span><br>
                        <a href="{{url('khoa-hoc',['slug' =>Str::slug($course->course_id),'id' =>$course->id])}}">
                            <h4>{{$course->course_id}}</h4>
                        </a>
                        <div class="course-teacher">
                            <div class="thum">
                                <a href="#">
                                    <!-- <img src="frontend/images/course/teacher/t-1.jpg" alt="teacher"> -->
                                    @if(isset($course->teacher_img))
                                    <img src="{{asset('./uploads/'.$course->teacher_img)}}" alt="" width="40" height="40">
                                    @else
                                    <img src="{{asset('../teacher.jpg')}}" alt="" width="40" height="40">
                                    @endif
                                </a>
                            </div>
                            <div class="name">
                                <a href="{{url('giao-vien',['id' =>$course->id])}}">
                                    <h6>{{$course->admin_name}}</h6>
                                </a>
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
        </div> <!-- course slied -->
    </div> <!-- container -->
</section>

<!--====== COURSE PART ENDS ======-->

<!--====== VIDEO FEATURE PART START ======-->

<section id="video-feature" class="bg_cover pt-60 pb-110" style="background-image: url(frontend/images/bg-1.jpg)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-last order-lg-first">
                <div class="video text-lg-left text-center pt-50">
                    <a class="Video-popup" href="https://www.youtube.com/watch?v=bRRtdzJH1oE"><i class="fa fa-play"></i></a>
                </div> <!-- row -->
            </div>
            <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                <div class="feature pt-50">
                    <div class="feature-title">
                        <h3>Our Facilities</h3>
                    </div>
                    <ul>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="frontend/images/all-icon/f-1.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>Global Certificate</h4>
                                    <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="frontend/images/all-icon/f-2.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>Alumni Support</h4>
                                    <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="frontend/images/all-icon/f-3.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>Books & Library</h4>
                                    <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                    </ul>
                </div> <!-- feature -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="feature-bg"></div> <!-- feature bg -->
</section>

<!--====== VIDEO FEATURE PART ENDS ======-->

<!--====== TEACHERS PART START ======-->

<section id="teachers-part" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5>Featured Teachers</h5>
                    <h2>Về giáo viên chúng tôi</h2>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p></p>
                    <a href="#" class="main-btn mt-55">Career with us</a>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="teachers mt-20">
                    <div class="row">
                        @foreach ($all_teachers as $all)
                        <div class="col-sm-6">
                            <div class="singel-teachers mt-30 text-center">
                                <div class="image">
                                    <!-- <img src="frontend/images/teachers/t-1.jpg" alt="Teachers"> -->
                                    @if(isset($all->teacher_img))
                                    <img src="{{asset('./uploads/'.$all->teacher_img)}}" alt="" width="100" height="300">
                                    @else
                                    <img src="{{asset('../teacher.jpg')}}" alt="" width="100" height="300">
                                    @endif
                                </div>
                                <div class="cont">
                                    <a href="{{url('giao-vien',['id' =>$all->id])}}">
                                        <h6>{{$all->admin_name}}</h6>
                                    </a>
                                    <span>{{$all->course_id}}</span>
                                </div>
                            </div> <!-- singel teachers -->
                        </div>
                        @endforeach
                    </div> <!-- row -->
                </div> <!-- teachers -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== TEACHERS PART ENDS ======-->

<!--====== TEASTIMONIAL PART START ======-->

<section id="testimonial" class="bg_cover pt-115 pb-115" data-overlay="8" style="background-image: url(frontend/images/bg-2.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-40">
                    <h5>Tổng quát</h5>
                    <h2>Giới thiệu giáo viên</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row testimonial-slied mt-40">
            @foreach($teachers as $teacher)
            <div class="col-lg-6">
                <div class="singel-testimonial">
                    <div class="testimonial-thum">
                        @if(isset($teacher->teacher_img))
                        <img src="{{asset('./uploads/'.$teacher->teacher_img)}}" alt="" width="100" height="100">
                        @else
                        <img src="{{asset('../teacher.jpg')}}" alt="" width="100" height="100">
                        @endif
                        <div class="quote">
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                    <div class="testimonial-cont">
                        <p>{{$teacher->about}}</p>
                        <h6>{{$teacher->admin_name}}</h6>
                        <span>{{$teacher->course_id}}</span>
                    </div>
                </div> <!-- singel testimonial -->
            </div>
            @endforeach
        </div> <!-- testimonial slied -->
    </div> <!-- container -->
</section>

<!--====== TEASTIMONIAL PART ENDS ======-->

<!--====== NEWS PART START ======-->

<section id="news-part" class="pt-115 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-50">
                    <h5>Blog</h5>
                    <h2>Blog mới nhất</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            @foreach ($all_blogs as $blog)
            <div class="col-lg-6">
                <div class="singel-news mt-30">
                    <div class="news-thum pb-25">
                        <img src="{{asset('./uploads/'.$blog->blog_img)}}" alt="News">
                    </div>
                    <div class="news-cont">
                        <ul>
                            <li><a href="#"><i class="fa fa-calendar"></i>{{$blog->blog_date}} </a></li>
                            <li><a href="#"> <span>By</span> {{$blog->admin_name}}</a></li>
                        </ul>
                        <a href="{{url('blog-chi-tiet/'.$blog->id)}}">
                            <h3>{{$blog->blog_title}}</h3>
                        </a>
                        <p>{{substr($blog->blog_desc,0,200)}}...</p>
                    </div>
                </div> <!-- singel news -->
            </div>
            @endforeach
            <div class="col-lg-6">
                @foreach ($list_blogs as $list)
                <div class="singel-news news-list">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="news-thum mt-30">
                                <img src="{{asset('./uploads/'.$list->blog_img)}}" alt="News">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="news-cont mt-30">
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar"></i>{{$list->blog_date}} </a></li>
                                    <li><a href="#"> <span>By</span> {{$list->admin_name}}</a></li>
                                </ul>
                                <a href="{{url('blog-chi-tiet/'.$list->id)}}">
                                    <h3>{{$list->blog_title}}</h3>
                                </a>
                                <p>{{substr($list->blog_desc,0,50)}}...</p>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- singel news -->
                @endforeach
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== NEWS PART ENDS ======-->

<!--====== PATNAR LOGO PART START ======-->

<div id="patnar-logo" class="pt-40 pb-80 gray-bg">
    <div class="container">
        <div class="row patnar-slied">
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="frontend/images/patnar-logo/p-1.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="frontend/images/patnar-logo/p-2.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="frontend/images/patnar-logo/p-3.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="frontend/images/patnar-logo/p-4.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="frontend/images/patnar-logo/p-2.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="frontend/images/patnar-logo/p-3.png" alt="Logo">
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>

<!--====== PATNAR LOGO PART ENDS ======-->
@endsection