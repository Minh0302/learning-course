@extends('welcome')

@section('content')

    <!--====== ABOUT PART START ======-->
    
    <section id="about-page" class="pt-70 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>About us</h5>
                        <h2>Welcome to Edubin </h2>
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                    </div>
                </div> <!-- about cont -->
                <div class="col-lg-7">
                    <div class="about-image mt-50">
                        <img src="{{asset('./banner.png')}}" alt="About">
                    </div>  <!-- about imag -->
                </div> 
            </div> <!-- row -->
            <div class="about-items pt-60">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>01</span>
                            <h4>Tại sao chọn chúng tôi</h4>
                            <p>Có những giáo viên xuất sắc, có năng lực và hiểu biết là rất quan trọng. Chúng tôi đảm bảo rằng sinh viên của chúng tôi được tiếp cận với phương pháp giảng dạy tốt nhất mà họ có thể có được bằng cách chỉ sử dụng các giáo viên có kinh nghiệm, trình độ cao.</p>
                        </div> <!-- about singel -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>02</span>
                            <h4>Nhiệm vụ chúng tôi</h4>
                            <p>Với sự phát triển mạnh mẽ của internet thì hiện nay phương pháp  luyện thi  online không còn quá xa lạ đối với các bạn học sinh nữa.Một điều vô cùng tuyệt vời đó chính là có đến hàng trăm website được ra đời để hỗ trợ cho việc học trực tuyến của các bạn. Nó không chỉ giúp giảm các bạn học sinh dễ dàng hơn trong quá trình luyện thi đại học mà còn giúp giảm thiểu chi phí học tập cũng như chi phí đi lại hiệu quả.</p>
                        </div> <!-- about singel -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>03</span>
                            <h4>Tầm nhìn chúng tôi</h4>
                            <p>Cung cấp cho học sinh từ lớp 1 đến lớp 12 những kiến thức, tư duy khoa học phổ thông vững vàng, có năng lực toán tốt để ứng dụng giải quyết vấn đề trong cuộc sống theo lứa tuổi, đáp ứng tiêu chí kiểm tra đánh giá của Bộ Giáo dục và Đào Tạo. Đào tạo phương pháp học tập khoa học, tự học, giúp học sinh phổ thông có khả năng học tập chủ động, tích cực, tự giác, có được niềm vui, say mê tự khám phá, chinh phục kiến thức, kĩ năng mới để phát triển và hoàn thiện bản thân.</p>
                        </div> <!-- about singel -->
                    </div>
                </div> <!-- row -->
            </div> <!-- about items -->
        </div> <!-- container -->
    </section>
    
    <!--====== ABOUT PART ENDS ======-->

    <!--====== COUNTER PART START ======-->
    
    <div id="counter-part" class="bg_cover pt-65 pb-110" data-overlay="8" style="background-image: url(images/bg-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">30,000</span>+</span>
                        <p>Học sinh</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">41,000</span>+</span>
                        <p>Khoá học</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">11,000</span>+</span>
                        <p>Tỉ lệ</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">39,000</span>+</span>
                        <p>Giáo viên</p>
                    </div> <!-- singel counter -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
    
    <!--====== COUNTER PART ENDS ======-->
   
    <!--====== TEACHERS PART START ======-->
    
    <section id="teachers-part" class="pt-65 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50 pb-35">
                        <h5>Featured Teachers</h5>
                        <h2>Về giáo viên chúng tôi</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                @foreach ($all_teachers as $teacher)
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            @if(isset($teacher->teacher_img))
                            <img src="{{asset('./uploads/'.$teacher->teacher_img)}}" alt="" width="100" height="300">
                            @else
                            <img src="{{asset('../teacher.jpg')}}" alt="" width="100" height="300">
                            @endif
                        </div>
                        <div class="cont">
                            <a href="{{url('giao-vien',['id' =>$teacher->id])}}"><h6>{{$teacher->admin_name}}</h6></a>
                            <span>{{$teacher->course_id}}</span>
                        </div>
                    </div> <!-- singel teachers -->
                </div>
                @endforeach
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== TEACHERS PART ENDS ======-->
   
    <!--====== TEASTIMONIAL PART START ======-->
    
    <section id="testimonial" class="bg_cover pt-115 pb-120" data-overlay="8" style="background-image: url(images/bg-2.jpg)">
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