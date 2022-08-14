@props(['id', 'label', 'title', 'isform' => false])

<div class="modal modal-windows" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $label }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      @if($isform)
        <form {{ $form->attributes }}>
          @csrf
      @endif
      <div class="modal-header">
        <div class="modal-title">{{ $title }}</div>
        <button type="button" class="btn-windows-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal-form-content">
          {{ $content }}
        </div>
        <div class="modal-form-action">
          {{ $action }}
        </div>
      </div>
      <div class="modal-footer">
        {{ $footer }}
      </div>
      @if($isform)
        </form>
      @endif
    </div>
  </div>
</div>
