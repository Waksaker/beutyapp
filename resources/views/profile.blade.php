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
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('showdash') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">LEAVE</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="leave.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Leave</span>
              </a>
            </li>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">CLAIM</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="claim.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Claim</span>
              </a>
            </li>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">ATTENDANCE</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="attandance.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Attendance</span>
              </a>
            </li>
          </ul>
        </nav>
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
                        <a href="" class="btn btn-outline-primary mx-3 mt-2 d-block">Profile</a>
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
                    <h5 class="card-title fw-semibold mb-4">Profile</h5>
                    <form name="profile" action="{{ route('actionprofile') }}" method="post">
                      @csrf
                      <div class="customer_records">
                        <div class="row mb-3">
                            <input type="text" class="form-control mb-3" id="date" name="id" value="{{ $user->user_id }}" style="display: none;">
                            <label for="datestart" class="col-sm-2 col-form-label">NAME :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control mb-3" id="date" name="name" value="{{ $user->name }}">
                            </div>
                            <label for="datestart" class="col-sm-2 col-form-label">PASSWORD :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control mb-1" id="password" name="password" value="{{ $user->pass }}">
                            </div>
                            <label for="dateend" class="col-sm-2 col-form-label">EMAIL :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control mb-1" id="purpose" name="email" value="{{ $user->email }}">
                            </div>
                            <label for="datestart" class="col-sm-2 col-form-label">PHONE NUMBER :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control mb-3" id="date" name="number" value="{{ $user->no_tel }}">
                            </div>
                            <label for="datestart" class="col-sm-2 col-form-label">LOCATION</label>
                            <div class="col-sm-4">
                              <textarea id="location" name="location" class="form-control" rows="4">{{ $user->location }}</textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mt-3" onClick="validate()">UPDATE</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('fail_profile'))
<script>
  document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
      icon: 'warning',
      text: 'Failed to update profile. Please try again.',
      confirmButtonColor: '#1B95CF'
    });
  });
</script>
@endif
<script>
  function validate() {
    profile = document.profile;
    if (profile.name.value==null||profile.name.value=="") {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in your correct name',
        confirmButtonColor: '#1B95CF'
      })
      form.name.focus();
      return;
    } else if (profile.password.value==null||profile.password.value=="") {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in your correct password!',
        confirmButtonColor: '#1B95CF'
      })
      form.password.focus();
      return;
    } else if (profile.email.value==null||profile.email.value=="") {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in your correct email!',
        confirmButtonColor: '#1B95CF'
      })
      form.email.focus();
      return;
    } else if (profile.number.value==null||profile.number.value=="") {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in your correct number!',
        confirmButtonColor: '#1B95CF'
      })
      form.number.focus();
      return;
    } else if (profile.location.value==null||profile.location.value=="") {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill in your correct location!',
        confirmButtonColor: '#1B95CF'
      })
      form.location.focus();
      return;
    }
    profile.submit();
  }
</script>
@endsection