@extends('welcome')

@section('content')

<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('../frontend/images/page-banner-2.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>{{$name_course->course_id}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/khoa-hoc')}}">Khoá học</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$name_course->course_id}}</li>
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
                                        @if(isset($detail->teacher_img))
                                        <img src="{{asset('./uploads/'.$detail->teacher_img)}}" alt="" class="rounded-circle" width="50" height="50">
                                        @else
                                        <img src="{{asset('../teacher.jpg')}}" alt="" class="rounded-circle" width="50" height="50">
                                        @endif
                                    </div>
                                    <div class="name">
                                        <span>Giáo viên</span>
                                        <h6>{{$detail->admin_name}}</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="course-category">
                                    <span>Khoá học</span>
                                    <h6>{{$detail->course_id}}</h6>
                                </div>
                            </li>
                            <li>
                                <div class="review">
                                    <span>Đánh giá</span>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li class="rating">({{$count_comment}} Reviws)</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- course terms -->
                    @endforeach
                    <div class="corses-singel-image pt-50">
                        <img src="{{asset('./uploads/'.$name_course->overview_img)}}" alt="Courses">
                    </div> <!-- corses singel image -->

                    <div class="corses-tab mt-30">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Tổng quát</a>
                            </li>
                            <li class="nav-item">
                                <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab" aria-controls="curriculam" aria-selected="false">Lộ trình</a>
                            </li>
                            <li class="nav-item">
                                <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab" aria-controls="instructor" aria-selected="false">Giới thiệu</a>
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
                                        <h6>Tóm tắt khoá học</h6>
                                        <p>{{$overview->summary}}</p>
                                    </div>
                                    <div class="singel-description pt-40">
                                        <h6>Yêu cầu khoá học</h6>
                                        <p>{{$overview->requirement}}</p>
                                    </div>
                                </div> <!-- overview description -->
                            </div>
                            @endforeach
                            <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                <div class="curriculam-cont">
                                    <div class="title">
                                        <h6>{{$name_course->course_id}}</h6>
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
                                                    <p>{{$lecture->lecture_desc}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div> <!-- curriculam cont -->
                            </div>
                            <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                @foreach($details as $detail)
                                <div class="instructor-cont">
                                    <div class="instructor-author">
                                        <div class="author-thum">
                                            @if(isset($detail->teacher_img))
                                            <img src="{{asset('./uploads/'.$detail->teacher_img)}}" alt="" class="rounded-circle" width="100" height="100">
                                            @else
                                            <img src="{{asset('../teacher.jpg')}}" alt="" class="rounded-circle" width="100" height="100">
                                            @endif
                                        </div>
                                        <div class="author-name">
                                            <a href="#">
                                                <h5>{{$detail->admin_name}}</h5>
                                            </a>
                                            <span>Teacher</span>
                                            <ul class="social">
                                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="instructor-description pt-25">
                                        <p>{{$detail->about}}</p>
                                    </div>
                                </div> <!-- instructor cont -->
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-cont">
                                    <div class="title">
                                        <h6>Học sinh Reviews</h6>
                                    </div>
                                    <ul>
                                        @foreach($comments as $comment)
                                        <li>
                                            <div class="singel-reviews">
                                                <div class="reviews-author">
                                                    <div class="author-thum">
                                                        <img src="{{asset('../user.png')}}" alt="Reviews" width="50" height="50">
                                                    </div>
                                                    <div class="author-name">
                                                        <h6>{{$comment->student_name}}</h6>
                                                        <span>{{$comment->date}}</span>
                                                    </div>
                                                </div>
                                                <div class="reviews-description pt-20">
                                                    <p>{{$comment->note}}</p>
                                                    <div class="rating">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                        <!-- <span>/ 5 Star</span> -->
                                                    </div>
                                                </div>
                                            </div> <!-- singel reviews -->
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="title pt-15">
                                        <h6>Bình Luận</h6>
                                    </div>
                                    <div class="reviews-form">
                                        <form action="{{url('comment-teacher')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-singel">
                                                        <input type="text" placeholder="Tên" name="student_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-singel">
                                                        @foreach($details as $detail)
                                                        <input type="hidden" value="{{$detail->id}}" name="teacher_id">
                                                        @endforeach
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
                                                        <textarea type="text" placeholder="Comment" name="note"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <button type="submit" class="main-btn">Thêm bình luận</button>
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
                            <h4>Khoá học </h4>
                            <ul>
                                <!-- <li><i class="fa fa-clock-o"></i>Duaration : <span>10 Hours</span></li> -->
                                <li><i class="fa fa-clone"></i>Bài học : <span>{{$lecture_count->lecture}}</span></li>
                                <li><i class="fa fa-beer"></i>Câu hỏi : <span>{{$question_count->question}}</span></li>
                                <li><i class="fa fa-user-o"></i>Học sinh : <span>100</span></li>
                            </ul>
                            <div class="price-button pt-10">
                                <span>Price : <b>Free</b></span>
                                @if(Session::get('customer_name'))
                                <a href="{{url('khoa-hoc/exam',['slug' =>Str::slug($detail->course_id),'id' =>$detail->id])}}" class="main-btn">Làm bài test</a>
                                @else
                                <a href="{{url('/login')}}" class="main-btn">Làm bài test</a>
                                @endif
                            </div>
                        </div> <!-- course features -->
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="You-makelike mt-30">
                            <h4>Có thể bạn thích </h4>
                            @foreach($course_like as $like)
                            <div class="singel-makelike mt-20">
                                <div class="image">
                                    <img src="{{asset('../frontend/images/your-make/y-1.jpg')}}" alt="Image">
                                </div>
                                <div class="cont">
                                    <a href="{{url('khoa-hoc',['slug' =>Str::slug($like->course_id),'id' =>$like->id])}}">
                                        <h4>{{$like->course_id}}</h4>
                                    </a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                        <li>Free</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-8">
                <div class="releted-courses pt-95">
                    <div class="title">
                        <h3>Khoá học liên quan</h3>
                    </div>
                    <div class="row">
                        @foreach ($course_related as $related)
                        <div class="col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="{{asset('./uploads/'.$related->overview_img)}}" alt="Course">
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
                                    <a href="{{url('khoa-hoc',['slug' =>Str::slug($related->course_id),'id' =>$related->id])}}">
                                        <h4>{{$related->course_id}}</h4>
                                    </a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="{{url('giao-vien',['id' =>$related->id])}}">
                                                @if(isset($related->teacher_img))
                                                <img src="{{asset('./uploads/'.$related->teacher_img)}}" alt="" width="40" height="40">
                                                @else
                                                <img src="{{asset('../teacher.jpg')}}" alt="" width="40" height="40">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="name">
                                            <a href="{{url('giao-vien',['id' =>$related->id])}}">
                                                <h6>{{$related->admin_name}}</h6>
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
                    </div> <!-- row -->
                </div> <!-- releted courses -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== COURSES SINGEl PART ENDS ======-->

@endsection