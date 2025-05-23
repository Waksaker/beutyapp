@extends('components.header')
@section('content')
<style>
  .custom-logo {
    max-width: 120px;
    height: auto;
  }

  @media (max-width: 576px) {
    .custom-logo {
      max-width: 80px;
    }
  }
</style>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" 
data-sidebar-position="fixed" data-header-position="fixed">
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="" class="text-nowrap logo-img">
            {{-- <h4>WANGSA MAJU (HQ)</h4> --}}
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="" class="custom-logo img-fluid">
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        @include('components.navbar')
      </div>
    </aside>
    <div class="body-wrapper">
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                    <i class="ti ti-bell-ringing"></i>
                    <!-- <div class="notification bg-primary rounded-circle"></div> -->
                </a>
                </li>
            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                    <div class="message-body">
                        <a href="{{ route('showlogin') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                        <a href="{{ route('showprofile') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Profile</a>
                    </div>
                    </div>
                </li>
                </ul>
            </div>
            </nav>
        </header>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Hi, {{ $user->name }}</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">List Order</h5>
                    <div class="card-body">
                      <div class="container-flex">
                          <div align="right">
                              <a href="{{ route('order') }}" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Order</a>
                            </div>
                          <div class="form-group row" style="gap: 10px;">
                              <h1 class="col-sm-4 col-form-label">PLEASE CHOOSE</h1>
                              <div class="col-sm-3">
                                  <select class="form-control" name="tahun" id="tahun"  value=''>
                                      @php
                                          $tahunmin = now()->year; // Tahun semasa
                                          $tahunmax = 2024; // Tahun maksimum
                                      @endphp
                                      @for ($i = $tahunmin; $i >= $tahunmax; $i--)
                                          <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>
                                              {{ $i }}
                                          </option>
                                      @endfor
                                  </select>
                              </div>
                              <div class="col-sm-4">
                                  <select class="form-control" name="bulan" id="bulan" onChange="getdata(this.value, '{{ $user->name }}')">
                                      <option value="" style="text-transform: uppercase">Please Choose...</option>
                                      <option value='01'>JANUARY</option>
                                      <option value='02'>FEBRUARY</option>
                                      <option value='03'>MARCH</option>
                                      <option value='04'>APRIL</option>
                                      <option value='05'>MAY</option>
                                      <option value='06'>JUNE</option>
                                      <option value='07'>JULY</option>
                                      <option value='08'>AUGUST</option>
                                      <option value='09'>SEPTEMBER</option>
                                      <option value='10'>OCTOBER</option>
                                      <option value='11'>NOVEMBER</option>
                                      <option value='12'>DECEMBER</option>
                                  </select>
                              </div>
                              <input type="hidden" name="name" id="name" value="{{ $user->name }}">
                          </div>
                          <div id="list"></div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('success_order'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        icon: 'success',
        text: 'Your order successful. Please check from list order',
        confirmButtonColor: '#1B95CF'
      });
    });
  </script>
@elseif (session('success_delete'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        icon: 'success',
        text: 'Delete item success',
        confirmButtonColor: '#1B95CF'
      });
    });
  </script>
@elseif (session('fail_delete'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        icon: 'warning',
        text: 'Delete invoice fail',
        confirmButtonColor: '#1B95CF'
      });
    });
  </script>
@elseif(session('fail_delete_all_invoice'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        icon: 'warning',
        text: 'Delete all invoice fail',
        confirmButtonColor: '#1B95CF'
      });
    });
  </script>
@elseif(session('success_delete_all_invoice'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        icon: 'success',
        text: 'Delete all invoice success',
        confirmButtonColor: '#1B95CF'
      });
    });
  </script>
@elseif(session('success_update'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        icon: 'success',
        text: 'Your update order successful. Please check from list order',
        confirmButtonColor: '#1B95CF'
      });
    });
  </script>
@endif
<script>
  function getdata(value, name) {
    let tahun = $('#tahun').val();
    let bulan = $('#bulan').val();
    
    console.log('Tahun :' + tahun + ' Bulan :' + bulan + ' Name :' + name);

    $.ajax({
        url: "{{ route('listorder') }}", // Route Laravel untuk dapatkan data
        type: "GET",
        data: { tahun: tahun, bulan: bulan, name: name },
        success: function(response) {
            $('#list').html(response); // Paparkan hasil dalam div #list
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
  }
</script>
@endsection