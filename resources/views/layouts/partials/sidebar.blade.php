@php
    $url = request()->path();
    $user = Auth::user();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-1">
  <div class="d-flex justify-content-center">
    <a href="/home" class="brand-link">
      <img src="{{ asset('img/rocket-icon.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BULSU - PPESO</span>
    </a>
  </div>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column sidebar-collapse" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/home" class="nav-link"><i class="fas fa-tachometer-alt"></i> <p>Dashboard</p></a>
        </li>

        <!-- ============================================================================== -->
        @if ($user->role_id == 2)
        {{-- <li class="nav-header">STUDENT</li> --}}
        {{-- <li class="nav-item">
          <a class="nav-link"><i class="fas fa-tachometer-alt"></i> <p>Dashboard</p></a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link"><i class="fas fa-file-alt"></i> <p>Vacancy</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fas fa-user"></i> <p>Profile</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fas fa-users"></i> <p>Seekers</p></a>
        </li>            
        @endif
        <!-- ============================================================================== -->
        {{-- 
        <li class="nav-header">EMPLOYER</li>
        <li class="nav-item">
          <a class="nav-link"><i class="fas fa-tachometer-alt"></i> <p>Dashboard</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fas fa-file-alt"></i> <p>Vacancy</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fas fa-user"></i> <p>Profile</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fas fa-users"></i> <p>Seekers</p></a>
        </li> --}}
        <!-- ============================================================================== -->
        @if ($user->role_id == 1)
          <li class="nav-header">ADMINISTRATOR</li>
          <!-- ------------------------------------------------------------------------------ -->
          <li class="nav-item has-treeview {{ in_array($url,['users','students']) ? 'menu-open' : '' }}">
            <a class="nav-link nav-item {{ in_array($url,['users','students']) ? 'active' : '' }}" href="#">
              <i class="fas fa-users-cog"></i>
              <p>User Management <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/users" class="nav-link {{ $url == "users" ? 'active' : '' }}"><i class="fas fa-users"></i> <p>Users</p></a>
              </li>
              <li class="nav-item">
                <a href="/students" class="nav-link {{ $url == "students" ? 'active' : '' }}"><i class="fas fa-users"></i> <Up>Students</p></a>
              </li>
              <li class="nav-item">
                <a class="nav-link"><i class="fas fa-users"></i> <p>Employers</p></a>
              </li>
            </ul>
          </li>            
          <!-- ------------------------------------------------------------------------------ -->
          <li class="nav-item has-treeview {{ in_array($url,['college','study']) ? 'menu-open' : '' }}">
            <a class="nav-link nav-item {{ in_array($url,['college','study']) ? 'active' : '' }}" href="#">
              <i class="fas fa-users-cog"></i>
              <p>System Setup <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/college" class="nav-link {{ $url == "college" ? 'active' : '' }}"><i class="fas fa-graduation-cap"></i> <p>College</p></a>
              </li>
              <li class="nav-item">
                <a href="/study" class="nav-link {{ $url == "study" ? 'active' : '' }}"><i class="fas fa-book"></i> <p>Job Specialization</p></a>
              </li>
              <li class="nav-item">
                <a class="nav-link"><i class="fas fa-calendar"></i> <p>Events</p></a>
              </li>
              <li class="nav-item">
                <a class="nav-link"><i class="fas fa-tasks"></i> <p>PSIC</p></a>
              </li>
              <li class="nav-item">
                <a class="nav-link"><i class="fas fa-tasks"></i> <p>PSOC</p></a>
              </li>
              <li class="nav-item">
                <a class="nav-link"><i class="fas fa-building"></i> <p>BULSU PPESO</p></a>
              </li>
              <li class="nav-item">
                <a class="nav-link"><i class="fas fa-envelope"></i> <p>Email Settings</p></a>
              </li>
            </ul>
          </li>
          <!-- ------------------------------------------------------------------------------ -->
        @endif
      </ul>
    </nav>
  </div>
</aside>
