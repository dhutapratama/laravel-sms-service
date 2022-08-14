<x-app-layout>
  <section class="container">
    <div class="row">
      <div class="col-12 col-md-9 col-lg-9">
        <x-card.windows>
          <x-slot name="title">Roles</x-slot>
          <x-slot name="navbar">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('management.user') }}">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('management.user.role') }}">Role</a>
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
                  <td>User Name</td>
                  <td>Email</td>
                  <td>Role</td>
                  <td>&nbsp;</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  @foreach ($user->roles as $role)
                    <tr>
                      <td class="fit">{{ $user->name }}</td>
                      <td class="fit">{{ $user->email }}</td>
                      <td>{{ $role->name }}</td>
                      <td class="text-end fit">
                        [<a href="{{ route('management.user.role.delete', ['id' => $user->id, 'role' => $role->name]) }}">remove role</a>]
                      </td>
                    </tr>
                  @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
        </x-card.windows>
      </div>
    </div>
  </section>

  <x-modal.windows id="new" label="new" title="Assign role into user" :isform="true">
    <x-slot name="form" method="POST" action="{{ route('management.user.role') }}"></x-slot>
    <x-slot name="content">
      <div class="row g-1 mb-1">
        <div class="col-3 windows-label">
          <label for="name" class="form-label">User Name: </label>
        </div>
        <div class="col-9">
          <select name="id" id="id" class="form-select">
            @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row g-1 mb-1">
        <div class="col-3 windows-label">
          <label for="name" class="form-label">Roles: </label>
        </div>
        <div class="col-9">
          <select name="role" id="role" class="form-select">
            @foreach ($roles as $role)
              <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </x-slot>
    <x-slot name="action">
      <button type="submit" class="btn btn-toolbar">Create</button>
      <button type="button" class="btn btn-toolbar" data-bs-dismiss="modal" aria-label="Close">Close</button>
    </x-slot>
    <x-slot name="footer">
      <div class="statusbar flex-grow-1">
        <div class="flex-fill">Create new role</div>
      </div>
    </x-slot>
  </x-modal.windows>
</x-app-layout>
