@props(['errors', 'type'])

@if ($errors->any())
  <div class="container-fluid">
    <div class="alert alert-{{ $type }}">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif
