<nav id="sidebar" class="sidebar w-200px d-md-block collapse">
  <ul class="nav flex-column flex-grow-1">
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
    <li class="nav-item dropend">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <span data-feather="settings" class="icon icon-md"></span>
        Management
      </a>
      <ul class="dropdown-menu">
        <li>
          <a class="dropdown-item" href="{{ route('management.user') }}">
            Users
          </a>
        </li>
        <li class="nav-item">
          <a class="dropdown-item" href="{{ route('management.role') }}">
            Roles
          </a>
        </li>
        <li class="nav-item">
          <a class="dropdown-item" href="{{ route('management.permission') }}">
            Permissions
          </a>
        </li>
      </ul>
    </li>

  </ul>
</nav>
