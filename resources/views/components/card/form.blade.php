<div class="card card-windows">
  <div class="card-header">
    <div class="card-title">{{ $title }}</div>
    <div class="card-toolbar">
      <button class="btn btn-sm btn-windows-close flex-column-fluid" type="button">
        <i data-feather="x" class="icon-windows"></i>
      </button>
    </div>
  </div>
  @if (isset($toolbox))
  <div class="card-toolbox">
    {{ $toolbox }}
  </div>
  @endif

  <div class="card-body">
    <form class="card-form" {{ $form->attributes }}>
      @csrf
      {{ $form }}
      <div class="card-form-content">
        {{ $content }}
      </div>
      <div class="card-form-action">
        {{ $action }}
      </div>
    </form>
  </div>

  <div class="card-footer">
    {{ $footer }}
  </div>
</div>
