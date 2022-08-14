<x-app-layout>
  <section class="container">
    <div class="row">
      <div class="col-12 col-md-9 col-lg-9">
        <x-card.windows>
          <x-slot name="title">Permissions</x-slot>
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
                  <td>Created</td>
                  <td>Name</td>
                  <td>Guard Name</td>
                  <td>Roles</td>
                  <td>&nbsp;</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $permission)
                  <tr>
                    <td class="fit">{{ format_date($permission->created_at) }}</td>
                    <td>{{ $permission->name }}</td>
                    <td class="fit">{{ $permission->guard_name }}</td>
                    <td>{{ implode(', ', $permission->roles->pluck('name')->all()) }}</td>
                    <td class="text-end">
                      [<a href="{{ route('management.permission.edit', $permission->id) }}">edit</a>]
                      [<a href="{{ route('management.permission.delete', $permission->id) }}">delete</a>]
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

  <x-modal.windows id="new" label="newPermission" title="Create New: Permission" :isform="true">
    <x-slot name="form" method="POST" action="{{ route('management.permission') }}"></x-slot>
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
