<div class="card card-windows">
  <div class="card-header">
    <div class="card-title">{{ $title }}</div>
    <div class="card-toolbar">
      <button class="btn btn-sm btn-windows-close flex-column-fluid" type="button">
        <i data-feather="x" class="icon-windows"></i>
      </button>
    </div>
  </div>
  @if (isset($navbar))
    <div class="card-navbar">
      {{ $navbar }}
    </div>
  @endif
  @if (isset($toolbox))
    <div class="card-toolbox">
      {{ $toolbox }}
    </div>
  @endif

  <div class="card-body">
    <div class="card-content">
      {{ $slot }}
    </div>
  </div>
</div>
