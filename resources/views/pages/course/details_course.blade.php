@extends('welcome')

@section('content')

<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('../frontend/images/page-banner-2.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Learn basic javascript</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Courses</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Learn basic javasript</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== COURSES SINGEl PART START ======-->

<section id="corses-singel" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">            
                <div class="corses-singel-left mt-30">
                    @foreach($details as $detail)
                    <div class="title">
                        <h3>{{$detail->course_id}}</h3>
                    </div> <!-- title -->
                    <div class="course-terms">
                        <ul>
                            <li>
                                <div class="teacher-name">
                                    <div class="thum">
                                        <img src="{{asset('../frontend/images/course/teacher/t-1.jpg')}}" alt="" class="rounded-circle"Teacher">
                                    </div>
                                    <div class="name">
                                        <span>Teacher</span>
                                        <h6>{{$detail->admin_name}}</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="course-category">
                                    <span>Category</span>
                                    <h6>Programaming </h6>
                                </div>
                            </li>
                            <li>
                                <div class="review">
                                    <span>Review</span>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li class="rating">(20 Reviws)</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- course terms -->
                    @endforeach
                    <div class="corses-singel-image pt-50">
                        <img src="{{asset('../frontend/images/course/cu-1.jpg')}}" alt="Courses">
                    </div> <!-- corses singel image -->

                    <div class="corses-tab mt-30">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab" aria-controls="curriculam" aria-selected="false">Curriculam</a>
                            </li>
                            <li class="nav-item">
                                <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab" aria-controls="instructor" aria-selected="false">Instructor</a>
                            </li>
                            <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            @foreach ($overviews as $overview)
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="overview-description">
                                    <div class="singel-description pt-40">
                                        <h6>Course Summery</h6>
                                        <p>{{$overview->summary}}</p>
                                    </div>
                                    <div class="singel-description pt-40">
                                        <h6>Requrements</h6>
                                        <p>{{$overview->requirement}}</p>
                                    </div>
                                </div> <!-- overview description -->
                            </div>
                            @endforeach
                            <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                <div class="curriculam-cont">
                                    <div class="title">
                                        <h6>Learn basis Lecture Started</h6>
                                    </div>
                                    <div class="accordion" id="accordionExample">
                                    @php
                                        $i = 1;
                                        $j = 1;
                                    @endphp
                                    @foreach($lectures as $lecture)
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <a href="#" data-toggle="collapse" data-target="#collapseOne_{{$lecture->id}}" aria-expanded="true" aria-controls="collapseOne_{{$lecture->id}}">
                                                    <ul>
                                                        <li><i class="fa fa-file-o"></i></li>
                                                        <li><span class="lecture">Lecture {{$i++}}</span></li>
                                                        <li><span class="head">{{$lecture->lecture_name}}</span></li>
                                                        <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                    </ul>
                                                </a>
                                            </div>

                                            <div id="collapseOne_{{$lecture->id}}" class="collapse <?php echo ($j++==1) ? "show" : ""?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div> <!-- curriculam cont -->
                            </div>
                            <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                <div class="instructor-cont">
                                    <div class="instructor-author">
                                        <div class="author-thum">
                                            <img src="{{asset('../frontend/images/instructor/i-1.jpg')}}" alt="Instructor">
                                        </div>
                                        <div class="author-name">
                                            <a href="#">
                                                <h5>Sumon Hasan</h5>
                                            </a>
                                            <span>Senior WordPress Developer</span>
                                            <ul class="social">
                                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="instructor-description pt-25">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga ratione molestiae unde provident quibusdam sunt, doloremque. Error omnis mollitia, ex dolor sequi. Et, quibusdam excepturi. Animi assumenda, consequuntur dolorum odio sit inventore aliquid, optio fugiat alias. Veritatis minima, dicta quam repudiandae repellat non sit, distinctio, impedit, expedita tempora numquam?</p>
                                    </div>
                                </div> <!-- instructor cont -->
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-cont">
                                    <div class="title">
                                        <h6>Student Reviews</h6>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="singel-reviews">
                                                <div class="reviews-author">
                                                    <div class="author-thum">
                                                        <img src="{{asset('../frontend/images/review/r-1.jpg')}}" alt="Reviews">
                                                    </div>
                                                    <div class="author-name">
                                                        <h6>Bobby Aktar</h6>
                                                        <span>April 03, 2019</span>
                                                    </div>
                                                </div>
                                                <div class="reviews-description pt-20">
                                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                                    <div class="rating">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                        <span>/ 5 Star</span>
                                                    </div>
                                                </div>
                                            </div> <!-- singel reviews -->
                                        </li>
                                        <li>
                                            <div class="singel-reviews">
                                                <div class="reviews-author">
                                                    <div class="author-thum">
                                                        <img src="{{asset('../frontend/images/review/r-2.jpg')}}" alt="Reviews">
                                                    </div>
                                                    <div class="author-name">
                                                        <h6>Humayun Ahmed</h6>
                                                        <span>April 13, 2019</span>
                                                    </div>
                                                </div>
                                                <div class="reviews-description pt-20">
                                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                                    <div class="rating">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                        <span>/ 5 Star</span>
                                                    </div>
                                                </div>
                                            </div> <!-- singel reviews -->
                                        </li>
                                        <li>
                                            <div class="singel-reviews">
                                                <div class="reviews-author">
                                                    <div class="author-thum">
                                                        <img src="{{asset('../frontend/images/review/r-3.jpg')}}" alt="Reviews">
                                                    </div>
                                                    <div class="author-name">
                                                        <h6>Tania Aktar</h6>
                                                        <span>April 20, 2019</span>
                                                    </div>
                                                </div>
                                                <div class="reviews-description pt-20">
                                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                                    <div class="rating">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                        <span>/ 5 Star</span>
                                                    </div>
                                                </div>
                                            </div> <!-- singel reviews -->
                                        </li>
                                    </ul>
                                    <div class="title pt-15">
                                        <h6>Leave A Comment</h6>
                                    </div>
                                    <div class="reviews-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-singel">
                                                        <input type="text" placeholder="Fast name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-singel">
                                                        <input type="text" placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <div class="rate-wrapper">
                                                            <div class="rate-label">Your Rating:</div>
                                                            <div class="rate">
                                                                <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <textarea placeholder="Comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <button type="button" class="main-btn">Post Comment</button>
                                                    </div>
                                                </div>
                                            </div> <!-- row -->
                                        </form>
                                    </div>
                                </div> <!-- reviews cont -->
                            </div>
                        </div> <!-- tab content -->
                    </div>
                </div> <!-- corses singel left -->
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="course-features mt-30">
                            <h4>Course Features </h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i>Duaration : <span>10 Hours</span></li>
                                <li><i class="fa fa-clone"></i>Leactures : <span>{{$lecture_count->lecture}}</span></li>
                                <li><i class="fa fa-beer"></i>Quizzes : <span>{{$question_count->question}}</span></li>
                                <li><i class="fa fa-user-o"></i>Students : <span>100</span></li>
                            </ul>
                            <div class="price-button pt-10">
                                <span>Price : <b>$25</b></span>
                                <a href="#" class="main-btn">Enroll Now</a>
                            </div>
                        </div> <!-- course features -->
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="You-makelike mt-30">
                            <h4>You make like </h4>
                            <div class="singel-makelike mt-20">
                                <div class="image">
                                    <img src="{{asset('../frontend/images/your-make/y-1.jpg')}}" alt="Image">
                                </div>
                                <div class="cont">
                                    <a href="#">
                                        <h4>Introduction to machine languages</h4>
                                    </a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                        <li>$50</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="singel-makelike mt-20">
                                <div class="image">
                                    <img src="{{asset('../frontend/images/your-make/y-1.jpg')}}" alt="Image">
                                </div>
                                <div class="cont">
                                    <a href="#">
                                        <h4>How to build a basis game with java </h4>
                                    </a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                        <li>$50</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="singel-makelike mt-20">
                                <div class="image">
                                    <img src="{{asset('../frontend/images/your-make/y-1.jpg')}}" alt="Image">
                                </div>
                                <div class="cont">
                                    <a href="#">
                                        <h4>Basic accounting from primary</h4>
                                    </a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                        <li>$50</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-8">
                <div class="releted-courses pt-95">
                    <div class="title">
                        <h3>Releted Courses</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="{{asset('../frontend/images/course/cu-2.jpg')}}" alt="Course">
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
                                    <span>(20 Reviws)</span>
                                    <a href="courses-singel.html">
                                        <h4>Learn basis javascirpt from start for beginner</h4>
                                    </a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img src="{{asset('../frontend/images/course/teacher/t-2.jpg')}}" alt="teacher"></a>
                                        </div>
                                        <div class="name">
                                            <a href="#">
                                                <h6>Mark anthem</h6>
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
                        <div class="col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="{{asset('../frontend/images/course/cu-1.jpg')}}" alt="Course">
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
                                    <span>(20 Reviws)</span>
                                    <a href="courses-singel.html">
                                        <h4>Learn basis javascirpt from start for beginner</h4>
                                    </a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img src="{{asset('../frontend/images/course/teacher/t-3.jpg')}}" alt="teacher"></a>
                                        </div>
                                        <div class="name">
                                            <a href="#">
                                                <h6>Mark anthem</h6>
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
                    </div> <!-- row -->
                </div> <!-- releted courses -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== COURSES SINGEl PART ENDS ======-->

@endsection