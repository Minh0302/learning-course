@extends('welcome')

@section('content')

 <!--====== PAGE BANNER PART START ======-->

 <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Giáo viên</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Giáo viên</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->
    
    <section id="teachers-singel" class="pt-70 pb-120 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="teachers-left mt-50">
                        <div class="hero">
                            <img src="{{asset('./uploads/'.$detail_teacher->teacher_img)}}" alt="Teachers">
                        </div>
                        <div class="name">
                            <h6>{{$detail_teacher->admin_name}}</h6>
                            <span>{{$detail_teacher->course_id}}</span>
                        </div>
                        <div class="social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            </ul>
                        </div>
                        <div class="description">
                            <p>{{$detail_teacher->about}}</p>
                        </div>
                    </div> <!-- teachers left -->
                </div>
                <div class="col-lg-8">
                    <div class="teachers-right mt-50">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true">Tổng quát</a>
                            </li>
                            <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh giá</a>
                            </li>
                        </ul> <!-- nav -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="dashboard-cont">
                                    <div class="singel-dashboard pt-40">
                                        <h5>About</h5>
                                        <p>{{$detail_teacher->about}}</p>
                                    </div> <!-- singel dashboard -->
                                    <div class="singel-dashboard pt-40">
                                        <h5>Thành tựu</h5>
                                        <p>{{$detail_teacher->achievements}}</p>
                                    </div> <!-- singel dashboard -->
                                    <div class="singel-dashboard pt-40">
                                        <h5>Mục tiêu nghề nghiệp</h5>
                                        <p>{{$detail_teacher->objectives}}</p>
                                    </div> <!-- singel dashboard -->
                                </div> <!-- dashboard cont -->
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-cont">
                                    <div class="title">
                                        <h6>Học sinh đánh giá</h6>
                                    </div>
                                    <ul>
                                    @foreach($comments as $comment)
                                       <li>
                                           <div class="singel-reviews">
                                                <div class="reviews-author">
                                                    <div class="author-thum">
                                                        <img src="{{asset('../user.png')}}" alt="Reviews" width="40" height="40">
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
                                                        <span>/ 5 Star</span>
                                                    </div>
                                                </div>
                                            </div> <!-- singel reviews -->
                                       </li>
                                      @endforeach
                                    </ul>
                                    <div class="title pt-15">
                                        <h6>Bình luận</h6>
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
                                                        <input type="hidden" value="{{$detail_teacher->id}}" name="teacher_id">
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
                    </div> <!-- teachers right -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== EVENTS PART ENDS ======-->

@endsection