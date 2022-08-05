@props(['id', 'label', 'title', 'isform' => false])

<div class="modal modal-windows fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $label }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      @if($isform)
        <form {{ $form->attributes }}>
          @csrf
      @endif
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{ $body }}
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
