<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ADMIN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('../backend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('../backend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{asset('../backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

  <!-- Template Main CSS File -->
  <link href="{{asset('../backend/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/css/sweetalert.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{url('/admin/dashboard')}}" class="logo d-flex align-items-center">
        <img src="{{asset('../backend/assets/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('../backend/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
            <?php
                $name = Auth::user()->admin_name;
                if($name){
                  echo $name;
                }
            ?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{url('admin-logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('/admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @hasrole(['admin'])
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Kho?? h???c</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('courses.create')}}">
              <i class="bi bi-circle"></i><span>Th??m kho?? h???c</span>
            </a>
          </li>
          <li>
            <a href="{{route('courses.index')}}">
              <i class="bi bi-circle"></i><span>Danh s??ch kho?? h???c</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Gi??o vi??n</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/teacher/assign')}}">
              <i class="bi bi-circle"></i><span>Ph??n c??ng Gi??o Vi??n</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/teacher/show')}}">
              <i class="bi bi-circle"></i><span>Qu???n l?? gi??o vi??n</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/teacher/list')}}">
              <i class="bi bi-circle"></i><span>Danh s??ch gi??o vi??n </span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav8" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Li??n h???</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav8" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{url('all-contact')}}">
              <i class="bi bi-circle"></i><span>Li???t k?? g??p ?? h???c sinh</span>
            </a>
          </li>
          <li>
            <a href="{{url('all-contact-teacher')}}">
              <i class="bi bi-circle"></i><span>Li???t k?? g??p ?? gi??o vi??n</span>
            </a>
          </li>
        </ul>
      </li>
      @endhasrole
      @hasrole(['author'])
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>T???ng qu??t</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('overview.create')}}">
              <i class="bi bi-circle"></i><span>Th??m gi???i thi???u</span>
            </a>
          </li>
          <li>
            <a href="{{route('overview.index')}}">
              <i class="bi bi-circle"></i><span>Danh s??ch</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>B??i h???c</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('lecture.create')}}">
              <i class="bi bi-circle"></i><span>Th??m b??i h???c</span>
            </a>
          </li>
          <li>
            <a href="{{route('lecture.index')}}">
              <i class="bi bi-circle"></i><span>Danh s??ch b??i h???c</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav5" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>T??i li???u</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav5" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('document.create')}}">
              <i class="bi bi-circle"></i><span>Th??m t??i li???u</span>
            </a>
          </li>
          <li>
            <a href="{{route('document.index')}}">
              <i class="bi bi-circle"></i><span>Danh s??ch t??i li???u</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav4" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>C??u h???i</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav4" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('question.create')}}">
              <i class="bi bi-circle"></i><span>Th??m c??u h???i</span>
            </a>
          </li>
          <li>
            <a href="{{route('question.index')}}">
              <i class="bi bi-circle"></i><span>Danh s??ch c??u h???i</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav7" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav7" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('blog.create')}}">
              <i class="bi bi-circle"></i><span>Th??m blog</span>
            </a>
          </li>
          <li>
            <a href="{{route('blog.index')}}">
              <i class="bi bi-circle"></i><span>Li???t k?? blog</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav8" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Li??n h???</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav8" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('all-contact')}}">
              <i class="bi bi-circle"></i><span>Li???t k?? g??p ??</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/admin/teacher/profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('teacher-contact')}}">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->
      @endhasrole
    </ul>

  </aside><!-- End Sidebar-->

  @yield('admin_content')


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('../backend/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('../backend/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('../backend/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('../backend/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('../backend/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('../backend/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('../backend/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('../backend/assets/vendor/echarts/echarts.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('../backend/assets/js/main.js')}}"></script>
  <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  <script src="{{asset('../backend/assets/js/sweetalert.js')}}"></script>
  <script type="text/javascript">
    function ChangeToSlug() {
      var slug;

      //L???y text t??? th??? input title 
      slug = document.getElementById("slug").value;
      slug = slug.toLowerCase();
      //?????i k?? t??? c?? d???u th??nh kh??ng d???u
      slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
      slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
      slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
      slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
      slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
      slug = slug.replace(/??|???|???|???|???/gi, 'y');
      slug = slug.replace(/??/gi, 'd');
      //X??a c??c k?? t??? ?????t bi???t
      slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
      //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
      slug = slug.replace(/ /gi, "-");
      //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
      //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
      slug = slug.replace(/\-\-\-\-\-/gi, '-');
      slug = slug.replace(/\-\-\-\-/gi, '-');
      slug = slug.replace(/\-\-\-/gi, '-');
      slug = slug.replace(/\-\-/gi, '-');
      //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
      slug = '@' + slug + '@';
      slug = slug.replace(/\@\-|\-\@|\@/gi, '');
      //In slug ra textbox c?? id ???slug???
      document.getElementById('convert_slug').value = slug;
    }
  </script>
  <!-- <script>
    $(document).ready(function() {
          $('.deleteBtn').click(function(e) {
              e.preventDefault();
              swal({
                  title: "Xo?? kho?? h???c",
                  text: "B???n c?? ch???c ch???n mu???n xo?? kho?? h???c n??y?",
                  type: "warning",
                  showCancelButton: true,
                  cancelButtonClass: "btn-secondary",
                  cancelButtonText: "Hu???",
                  confirmButtonClass: "btn-primary",
                  confirmButtonText: "X??c nh???n",
                  closeOnConfirm: false
                })
              })
          })
  </script> -->
</body>

</html>