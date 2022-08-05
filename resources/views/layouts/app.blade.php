<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }}</title>

  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
  <link href="{{ asset('css/misp-theme.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column">
  <header>
    <div class="navbar navbar-windows">
      <div class="d-flex flex-grow-1 justify-content-between">
        <div class="windows-title">
          <a href="#" class="navbar-brand d-flex align-items-center">
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
        <div class="btn-group btn-group-menu" role="group" aria-label="Small button group">
          <button type="button" class="btn btn-menu">Menu</button>
          <button type="button" class="btn btn-menu">Device</button>
        </div>
      </div>
    </div>
    <div class="navbar navbar-toolbar">
      <div class="toolbar">
        <button class="btn btn-toolbar" type="button">
          <i data-feather="skip-back" class="icon icon-sm"></i>
        </button>

        <button class="btn btn-toolbar" type="button">
          <i data-feather="fast-forward" class="icon icon-sm"></i>
        </button>
        <button class="btn btn-toolbar" type="button">
          <i data-feather="skip-forward" class="icon icon-sm"></i>
        </button>
        <button class="btn btn-toolbar ms-2" type="button">
          Save Mode
        </button>
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
    <nav id="sidebar" class="sidebar w-200px d-md-block collapse">
      <div class="d-flex">
        <ul class="nav flex-column flex-grow-1">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <span data-feather="file" class="icon icon-md"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sms.create') }}">
              <span data-feather="file" class="icon icon-md"></span>
              Create SMS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sms.outbox') }}">
              <span data-feather="box" class="icon icon-md"></span>
              Outbox
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sms.sent') }}">
              <span data-feather="truck" class="icon icon-md"></span>
              Sent
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('device') }}">
              <span data-feather="smartphone" class="icon icon-md"></span>
              Management
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('management.user') }}">
              <span data-feather="users" class="icon icon-md"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('management.role') }}">
              <span data-feather="users" class="icon icon-md"></span>
              Roles
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('management.permission') }}">
              <span data-feather="users" class="icon icon-md"></span>
              Permissions
            </a>
          </li>
        </ul>
      </div>
    </nav>
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
  <script async src="{{ asset('js/bundle.js') }}"></script>
</body>

</html>
