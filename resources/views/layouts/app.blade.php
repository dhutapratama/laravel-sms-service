<x-base-layout>
  <header>
    <div class="navbar navbar-windows">
      <div class="d-flex flex-grow-1 justify-content-between">
        <div class="windows-title">
          <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
            <span data-feather="shopping-cart" class="icon-sm me-2"></span>
            {{ env('APP_NAME') }} v1.0.0
          </a>
        </div>
        <div class="windows-action">
          <button class="btn btn-sm btn-windows flex-column-fluid" type="button">
            <i data-feather="gitlab" class="icon-windows"></i>
          </button>
          <button class="btn btn-sm btn-windows flex-column-fluid" type="button">
            <i data-feather="square" class="icon-windows"></i>
          </button>
          <button class="btn btn-sm btn-windows-close flex-column-fluid" type="button">
            <i data-feather="x" class="icon-windows"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="navbar navbar-windows">
      <div class="d-flex flex-row">
        <div class="btn-group btn-group-menu windows-menu" role="group" aria-label="Main Menu">
          <div class="btn-group">
            <button type="button" class="btn btn-menu" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">New</a></li>
              <li><a class="dropdown-item" href="#">Open...</a></li>
              <li><a class="dropdown-item" href="#">Save</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </div>
          <button type="button" class="btn btn-menu">
            Help
          </button>
        </div>
      </div>
    </div>
    <div class="navbar navbar-toolbar">
      <div class="toolbar">
        <button class="btn btn-toolbar" type="button" title="Dashboard">
          <i data-feather="home" class="icon icon-sm"></i>
        </button>
        <button class="btn btn-toolbar" type="button" title="Android Device">
          <i data-feather="smartphone" class="icon icon-sm"></i>
        </button>
        <a href="{{ route('dashboard') }}" class="btn btn-toolbar ms-2" title="Your account type, click to upgrade.">
          Account Type: Regular
        </a>
      </div>
      <div class="toolbar">
        <button class="btn btn-toolbar d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
          <i data-feather="menu" class="icon icon-sm"></i>
        </button>
        <a href="{{ route('logout') }}" class="btn btn-toolbar" type="button">
          Logout
        </a>
      </div>
    </div>
  </header>

  <div class="d-flex flex-row flex-column-fluid">
    <x-sidebar.general></x-sidebar.general>
    <div class="content flex-column flex-row-fluid">
      <main class="flex-column-fluid flex-grow-1 py-2">
        {{ $slot }}
      </main>
    </div>
  </div>

  <footer>
    <div class="container-fluid">
      <div class="statusbar">
        <div class="flex-fill">&copy;2022 Mikrotik ISP Team</div>
        <div class="flex-fill">Indonesia</div>
        <div class="flex-fill">Online</div>
      </div>
    </div>
  </footer>
</x-base-layout>
