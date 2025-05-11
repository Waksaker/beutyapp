<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/mra.PNG') }}" />
  
  <!-- Android PWA Manifest -->
  <link rel="manifest" href="manifest.json">
  <meta name="theme-color" content="#0d6efd">


  <!-- Apple Touch Icon (iPhone/iPad) -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logos/mra-180.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-title" content="MRA">
  
  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/styles.min.css">
  <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <!-- <img src="assets/images/logos/logomra.png" width="180" alt=""> -->
                  <h3><b>Forgot Password</b></h3>
                </a>
                <form name="forgot" action="" method="post">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <button type="button" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" onClick="validate()">Submit</button>
                  <a href="{{ route('showlogin') }}" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
  <script>
    function validate() 
    {
      form = document.forgot;
      if	(form.email.value == null || form.email.value=="")
      {
        Swal.fire({
          icon: 'warning',
          text: 'Please fill in your correct e-mail!',
          confirmButtonColor: '#1B95CF'
        })
        form.email.focus();
        return;
      }
      form.submit();
    }
  </script>
</body>
</html>