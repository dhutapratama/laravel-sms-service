<div class="card card-windows">
  <div class="card-header">
    <div class="card-title">{{ $title }}</div>
    <div class="card-toolbar">
      <button class="btn btn-sm btn-windows-close flex-column-fluid" type="button">
        <i data-feather="x" class="icon-windows"></i>
      </button>
    </div>
  </div>
  <div class="card-toolbox">
    <button class="btn btn-toolbar-app" type="button" title="Dashboard">
      <i data-feather="plus" class="icon icon-sm"></i>
    </button>
    <button class="btn btn-toolbar-app" type="button" title="Android Device">
      <i data-feather="minus" class="icon icon-sm"></i>
    </button>
  </div>
  <div class="card-body">
    <div class="card-content">
      {{ $slot }}
    </div>
  </div>
</div>
