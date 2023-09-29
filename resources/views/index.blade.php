<!DOCTYPE html>
<html lang="en">
@include('components.header')

  <body class="layout-3">
    <div id="app">
      <div class="main-wrapper container">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <a href="index.html" class="navbar-brand sidebar-gone-hide">Stisla</a>
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar">
            <i class="fas fa-bars"></i>
          </a>
          <div class="nav-collapse">
            <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
              <i class="fas fa-ellipsis-v"></i>
            </a>
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a href="#" class="nav-link">Application</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Report Something</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Server Status</a>
              </li>
            </ul>
          </div>
          <ul class="ml-auto navbar-nav navbar-right"> @guest
            <!-- Periksa apakah pengguna belum login -->
            <li class="nav-item">
              <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
            </li> @else
            <!-- Jika pengguna sudah login -->
            <li class="nav-item">
              <a href="dashboard" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="features-profile.html" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> Profile </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                  <i class="fas fa-cog"></i> Settings </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
              </div>
            </li> @endguest
          </ul>
        </nav>
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            
          </section>
        </div>
        <footer class="main-footer">
          <div class="footer-left"> Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://trionohidayat.com/">Triono Hidayat</a>
          </div>
          <div class="footer-right"></div>
        </footer>
      </div>
    </div>
    @include('components.script')
  </body>
</html>