@props(['errors'])

@if ($errors->any())
  <div {{ $attributes }}>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
