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
                    <h5 class="card-title fw-semibold mb-4">Order Items</h5>
                    <form name="order" action="{{ route('orderaction') }}" method="post">
                      @csrf
                      <div class="customer_records">
                        <div class="row mb-3">
                            <input type="text" class="form-control mb-1" id="name" name="name" value="{{ $orders->name }}" style="display: none;">
                            <label for="datestart" class="col-sm-2 col-form-label">PHONE NUMBER :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control mb-3" id="number" name="number" value="{{ $orders->tele_no }}">
                            </div>
                            <label for="datestart" class="col-sm-2 col-form-label">DATE :</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control mb-3" id="date" name="date" value="{{ $orders->date }}">
                            </div>
                            <label for="datestart" class="col-sm-2 col-form-label">ITEM :</label>
                            <div class="col-sm-4">
                                <select name="item" id="item" class="form-control mb-3">
                                    <option value="">Please Choose</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->name }}" {{ $orders->item == $item->name ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="datestart" class="col-sm-2 col-form-label">QUANTITY :</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control mb-1" id="quantity" name="quantity" value="{{ $orders->quantity }}">
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mt-3" onClick="validate()">SUBMIT</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('fail_insert'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        icon: 'success',
        text: 'Your order fail. Please fill form again',
        confirmButtonColor: '#1B95CF'
      });
    });
  </script>
@elseif (session('fail_item'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        icon: 'success',
        text: 'Fail item. Please choose item again',
        confirmButtonColor: '#1B95CF'
      });
    });
  </script>
@endif
<script>
  function validate() {
    order = document.order;
    if (order.item.value==null||order.item.value=="") {
      Swal.fire({
        icon: 'warning',
        text: 'Please choose item',
        confirmButtonColor: '#1B95CF'
      })
      form.item.focus();
      return;
    } else if (order.quantity.value==null||order.quantity.value=="") {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill quantity',
        confirmButtonColor: '#1B95CF'
      })
      form.quantity.focus();
      return;
    } else if (order.date.value==null||order.date.value=="") {
      Swal.fire({
        icon: 'warning',
        text: 'Please fill date',
        confirmButtonColor: '#1B95CF'
      })
      form.date.focus();
      return;
    }
    order.submit();
  }
</script>
@endsection