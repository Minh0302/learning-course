@extends('welcome')

@section('content')

    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url({{asset('../frontend/images/page-banner-2.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/blog')}}">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$details_blogs->blog_title}}</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== BLOG PART START ======-->
    
    <section id="blog-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
              <div class="col-lg-8">
                  <div class="blog-details mt-30">
                      <div class="thum">
                          <img src="{{asset('./uploads/'.$details_blogs->blog_img)}}" alt="Blog Details">
                      </div>
                      <div class="cont">
                          <h3>{{$details_blogs->blog_title}}</h3>
                          <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i>{{$details_blogs->blog_date}}</a></li>
                               <li><a href="#"><i class="fa fa-user"></i>{{$details_blogs->admin_name}}</a></li>
                               <li><a href="#"><i class="fa fa-tags"></i>{{$details_blogs->course_id}}</a></li>
                           </ul>
                           <p>
                           {{$details_blogs->blog_desc}}
                           </p>
                           <ul class="share">
                               <li class="title">Share :</li>
                               <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                           </ul>
                      </div> <!-- cont -->
                  </div> <!-- blog details -->
              </div>
               <div class="col-lg-4">
                   <div class="saidbar">
                       <div class="row">
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-post mt-30">
                                   <h4>Popular Posts</h4>
                                   <ul>
                                   @foreach($popular_blogs as $popular)
                                       <li>
                                            <a href="{{url('blog-chi-tiet/'.$popular->id)}}">
                                                <div class="singel-post">
                                                   <div class="thum">
                                                       <img src="{{asset('./uploads/'.$popular->blog_img)}}" alt="Blog">
                                                   </div>
                                                   <div class="cont">
                                                       <h6>{{$popular->blog_title}}</h6>
                                                       <i class="fa fa-user"></i><span> {{$popular->admin_name}}</span>
                                                       <i class="fa fa-calendar"></i><span>  {{$popular->blog_date}}</span>
                                                   </div>
                                               </div> <!-- singel post -->
                                            </a>
                                       </li>
                                       @endforeach
                                   </ul>
                               </div> <!-- saidbar post -->
                           </div>
                       </div> <!-- row -->
                   </div> <!-- saidbar -->
               </div>
           </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== BLOG PART ENDS ======-->
@endsection