@extends('welcome')

@section('content')
<style type="text/css">
    .section-title h5::before{
        margin-left: 48%;
    }
</style>
<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-6.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Kết quả</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kết quả</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== CONTACT PART START ======-->

<section id="contact-page" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-from mt-30">
                    <div class="section-title" style="text-align: center">
                        <h5>Bạn đã hoàn thành bài thi</h5>
                        <h2>Kết quả: {{Session::get('correct')}}/{{$all_questions}}</h2>
                    </div> <!-- section title -->
                </div> <!--  contact from -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== CONTACT PART ENDS ======-->

@endsection