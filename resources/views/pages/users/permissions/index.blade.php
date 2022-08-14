<x-app-layout>
  <section class="container">
    <div class="row">
      <div class="col-12 col-md-9 col-lg-9">
        <x-card.windows>
          <x-slot name="title">Permissions</x-slot>
          <x-slot name="navbar">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('management.user') }}">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('management.user.role') }}">Role</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('management.user.permission') }}">Direct Permission</a>
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
                  <td>Direct Permission</td>
                  <td>&nbsp;</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  @foreach ($user->getDirectPermissions() as $permission)
                    <tr>
                      <td class="fit">{{ $user->name }}</td>
                      <td class="fit">{{ $user->email }}</td>
                      <td>{{ $permission->name }}</td>
                      <td class="text-end fit">
                        [<a href="{{ route('management.user.permission.delete', ['id' => $user->id, 'permission' => $permission->name]) }}">revoke</a>]
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

  <x-modal.windows id="new" label="newPermission" title="Assign direct permission to user" :isform="true">
    <x-slot name="form" method="POST" action="{{ route('management.user.permission') }}"></x-slot>
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
          <label for="name" class="form-label">Permission: </label>
        </div>
        <div class="col-9">
          <select name="permission" id="permission" class="form-select">
            @foreach ($permissions as $permission)
              <option value="{{ $permission->name }}">{{ $permission->name }}</option>
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
        <div class="flex-fill">Create new permission</div>
      </div>
    </x-slot>
  </x-modal.windows>
</x-app-layout>
