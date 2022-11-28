<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ADMIN LOGIN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('../backend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('../backend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('../backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('../backend/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('../backend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">LEARNING</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Tạo tài khoản</h5>
                    <p class="text-center small">Vui lòng nhập đầy đủ thông tin</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post" action="{{url('admin-register')}}">
                    @csrf
                    <div class="col-12">
                      <label for="yourName" class="form-label">Họ - Tên</label>
                      <input type="text" name="admin_name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Vui lòng nhập họ tên</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="admin_email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Email không đúng định dạng</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Phone</label>
                      <div class="input-group has-validation">
                        <input type="text" name="admin_phone" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Vui lòng nhập số điện thoại.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="admin_password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Vui lòng nhập password</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Đăng kí</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Bạn đã có tài khoản? <a href="{{url('/admin')}}">Đăng nhập</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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

</body>

</html>