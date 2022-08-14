<x-app-layout>
  <section class="container">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <x-card.windows>
          <x-slot name="title">Users</x-slot>
          <x-slot name="navbar">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('management.user') }}">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('management.user.role') }}">Role</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('management.user.permission') }}">Direct Permission</a>
              </li>
            </ul>
          </x-slot>
          <x-slot name="toolbox">
            <button class="btn btn-toolbar-app" type="button" title="New" data-bs-toggle="modal" data-bs-target="#new">
              <i data-feather="plus" class="icon icon-sm"></i>
            </button>
            <button class="btn btn-toolbar-app" type="button" title="Remove">
              <i data-feather="minus" class="icon icon-sm"></i>
            </button>
          </x-slot>
          <div class="table-windows-container">
            <table class="table table-windows">
              <thead>
                <tr>
                  <td class="fit">ID</td>
                  <td>Name</td>
                  <td class="fit">Email</td>
                  <td class="fit">Created</td>
                  <td class="fit">Updated</td>
                  <td class="fit">Deleted</td>
                  <td class="fit">&nbsp;</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td class="fit">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td class="fit">{{ $user->email }}</td>
                    <td class="fit">{{ $user->created_at }}</td>
                    <td class="fit">{{ $user->updated_at }}</td>
                    <td class="fit">{{ $user->deleted_at }}</td>
                    <td class="fit">
                      [<a href="{{ route('management.user.edit', $user->id) }}">edit</a>]
                      [<a href="{{ route('management.user.delete', $user->id) }}">delete</a>]
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </x-card.windows>
      </div>
    </div>
  </section>

  <x-modal.windows id="new" label="newUser" title="Create New: User" :isform="true">
    <x-slot name="form" method="POST" action="{{ route('management.user') }}"></x-slot>
    <x-slot name="content">
      <div class="row g-1 mb-1">
        <div class="col-3 windows-label">
          <label for="name" class="form-label">Name: </label>
        </div>
        <div class="col-9">
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
      </div>
      <div class="row g-1 mb-1">
        <div class="col-3 windows-label">
          <label for="email" class="form-label">Email: </label>
        </div>
        <div class="col-9">
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
      </div>
      <div class="row g-1 mb-1">
        <div class="col-3 windows-label">
          <label for="password" class="form-label">Password: </label>
        </div>
        <div class="col-9">
          <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
        </div>
      </div>
      <div class="row g-1 mb-1">
        <div class="col-3 windows-label">
          <label for="password_confirmation" class="form-label">Confirm: </label>
        </div>
        <div class="col-9">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
      </div>
    </x-slot>
    <x-slot name="action">
      <button type="submit" class="btn btn-toolbar">Create</button>
      <button type="button" class="btn btn-toolbar" data-bs-dismiss="modal" aria-label="Close">Close</button>
    </x-slot>
    <x-slot name="footer">
      <div class="statusbar flex-grow-1">
        <div class="flex-fill">Create new permission</div>
      </div>
    </x-slot>
  </x-modal.windows>
</x-app-layout>
