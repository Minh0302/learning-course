@extends('welcome')

@section('content')

    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url({{asset('../frontend/images/page-banner-2.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Blog</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== BLOG PART START ======-->
    
    <section id="blog-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
               <div class="col-lg-8">
                    @foreach ($all_blogs as $blog)
                   <div class="singel-blog mt-30">
                       <div class="blog-thum">
                           <img src="{{asset('./uploads/'.$blog->blog_img)}}" alt="Blog">
                       </div>
                       <div class="blog-cont">
                           <a href="{{url('blog-chi-tiet/'.$blog->id)}}"><h3>{{$blog->blog_title}}</h3></a>
                           <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i>{{$blog->blog_date}}</a></li>
                               <li><a href="#"><i class="fa fa-user"></i>{{$blog->admin_name}}</a></li>
                               <li><a href="#"><i class="fa fa-tags"></i>{{$blog->course_id}}</a></li>
                           </ul>
                           <p>{{substr($blog->blog_desc,0,200)}}...</p>
                       </div>
                   </div> <!-- singel blog -->
                    @endforeach
                   <!-- <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-lg-end justify-content-center">
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
                    </nav>  courses pagination -->
                    <div class="mt-50">
                        {{$all_blogs->links('pagination::bootstrap-4')}}
                    </div>
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