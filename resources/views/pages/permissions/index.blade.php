<x-app-layout>
  <section class="container">
    <div class="row">
      <div class="col-4">
        <div class="card card-windows">
          <div class="card-header">
            <div class="card-title">Permissions</div>
            <div class="card-toolbar">
              <button class="btn btn-sm btn-windows-close flex-column-fluid" type="button">
                <i data-feather="x" class="icon-windows"></i>
              </button>
            </div>
          </div>
          <div class="card-menu">
            <div class="btn-group btn-group-menu" role="group" aria-label="Small button group">
              <a href="#" class="btn btn-menu" data-bs-toggle="modal" data-bs-target="#new">New</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-windows-container">
              <table class="table table-windows">
                <thead>
                  <tr>
                    <td>Created</td>
                    <td>Name</td>
                    <td>Guard Name</td>
                    <td>Permissions</td>
                    <td>&nbsp;</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach($permissions as $permission)
                  <tr>
                    <td>{{ format_date($permission->created_at) }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td class="text-end">
                      [<a href="#">edit</a>]
                      [<a href="{{ route('management.permission.remove', $permission->id) }}">delete</a>]
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <x-modal.windows id="new" label="newPermission" title="Create New: Permission" :isform="true">
    <x-slot name="form" method="POST" action="{{ route('management.permission.save') }}"></x-slot>
    <x-slot name="content">
      <div class="row g-1 mb-1">
        <div class="col-2 windows-label">
          <label for="name" class="form-label">Name: </label>
        </div>
        <div class="col-10">
          <input type="text" class="form-control" id="name" name="name" value="">
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
