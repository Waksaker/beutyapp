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
      <span class="hide-menu">ORDER</span>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="{{ route('showorder') }}" aria-expanded="false">
        <span>
          <i class="ti ti-article"></i>
        </span>
        <span class="hide-menu">Order</span>
      </a>
    </li>
  </ul>
</nav>