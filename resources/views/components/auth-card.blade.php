<div class="card card-windows card-auth">
  <div class="card-header">
    <div class="card-title">{{ $title }}</div>
    <div class="card-toolbar">
      <button class="btn btn-sm btn-windows-close flex-column-fluid" type="button">
        <i data-feather="x" class="icon-windows"></i>
      </button>
    </div>
  </div>
  <div class="card-menu">
    <div class="btn-group btn-group-menu" role="group" aria-label="Small button group">
      <button type="button" class="btn btn-menu">Session</button>
      <button type="button" class="btn btn-menu">Settings</button>
      <button type="button" class="btn btn-menu">Dashboard</button>
    </div>
  </div>
  <div class="card-body">
    <div class="card-content">
      {{ $slot }}
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
</div>
