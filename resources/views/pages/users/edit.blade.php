<x-app-layout>
  <section class="container">
    <div class="row">
      <div class="col-12 col-lg-8">
        <x-card.form>
          <x-slot name="form" method="POST" action="{{ route('management.user') }}">
            <input type="hidden" name="id" value="{{ $user->id }}" />
          </x-slot>
          <x-slot name="title">User ({{ $user->name }})</x-slot>
          <x-slot name="content">
            <div class="row g-1 mb-1">
              <div class="col-3 windows-label">
                <label for="name" class="form-label">Name: </label>
              </div>
              <div class="col-9">
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
              </div>
            </div>
            <div class="row g-1 mb-1">
              <div class="col-3 windows-label">
                <label for="email" class="form-label">Email: </label>
              </div>
              <div class="col-9">
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
              </div>
            </div>
            <div class="row g-1 mb-1">
              <div class="col-3 windows-label">
                <label for="password" class="form-label">Password: </label>
              </div>
              <div class="col-9">
                <input type="password" class="form-control" id="password" name="password" value="">
              </div>
            </div>
            <div class="row g-1 mb-1">
              <div class="col-3 windows-label">
                <label for="password_confirmation" class="form-label">Confirm: </label>
              </div>
              <div class="col-9">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="">
              </div>
            </div>
          </x-slot>
          <x-slot name="action">
            <button type="submit" class="btn btn-toolbar">Save</button>
            <a href="{{ route('management.user') }}" class="btn btn-toolbar">Close</a>
          </x-slot>
          <x-slot name="footer">
            <div class="statusbar flex-grow-1">
              <div class="flex-fill">Leave password empty if not change.</div>
            </div>
          </x-slot>
        </x-card.form>
      </div>
    </div>
  </section>
</x-app-layout>
