
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="/dashboard">Stisla</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="/dashboard">St</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="/dashboard">
        <i class="fas fa-fire"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="menu-header">User Management</li>
    <li class="dropdown {{ request()->is('users') || request()->is('users/create') ? 'active' : '' }}">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-columns"></i>
        <span>User</span>
      </a>
      <ul class="dropdown-menu">
        <li class="{{ request()->is('users') ? 'active' : '' }}">
          <a class="nav-link" href="/users">Overview</a>
        </li>
        <li class="{{ request()->is('users/create') ? 'active' : '' }}">
          <a class="nav-link" href="/users/create">Add New User</a>
        </li>
      </ul>
    </li>
    <li class="dropdown {{ request()->is('roles') || request()->is('roles/create') ? 'active' : '' }}">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-ellipsis-h"></i>
        <span>Role</span>
      </a>
      <ul class="dropdown-menu">
        <li class="{{ request()->is('roles') ? 'active' : '' }}">
          <a class="nav-link" href="/roles">Overview</a>
        </li>
        <li class="{{ request()->is('roles/create') ? 'active' : '' }}">
          <a class="nav-link" href="/roles/create">Add New Role</a>
        </li>
      </ul>
    </li>
    <li class="menu-header">Pages</li>
    <li class="{{ request()->is('blank') ? 'active' : '' }}">
      <a class="nav-link" href="/blank">
        <i class="fas fa-square"></i>
        <span>Blank</span>
      </a>
    </li>
  </ul>
  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
      <i class="fas fa-rocket"></i> Documentation </a>
  </div>
</aside>
      </div>