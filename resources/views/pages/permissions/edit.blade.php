<x-app-layout>
  <section class="container">
    <div class="row">
      <div class="col-12 col-lg-8">
        <x-card.form>
          <x-slot name="form" method="POST" action="{{ route('management.permission') }}">
            <input type="hidden" name="id" value="{{ $permission->id }}" />
          </x-slot>
          <x-slot name="title">Permission ({{ $permission->name }})</x-slot>
          <x-slot name="content">
            <div class="row g-1 mb-1">
              <div class="col-3 windows-label">
                <label for="name" class="form-label">Name: </label>
              </div>
              <div class="col-9">
                <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name }}" required>
              </div>
            </div>
          </x-slot>
          <x-slot name="action">
            <button type="submit" class="btn btn-toolbar">Save</button>
            <a href="{{ route('management.user') }}" class="btn btn-toolbar">Close</a>
          </x-slot>
          <x-slot name="footer">
            <div class="statusbar flex-grow-1">
              <div class="flex-fill">Edit role name.</div>
            </div>
          </x-slot>
        </x-card.form>
      </div>
    </div>
  </section>
</x-app-layout>
