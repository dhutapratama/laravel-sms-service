<x-app-layout>
  <section class="container">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <x-card>
          <x-slot name="title">Users</x-slot>
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
                  <td>Username</td>
                  <td class="fit">Email</td>
                  <td class="fit">&nbsp;</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td class="fit">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td class="fit">{{ $user->email }}</td>
                    <td class="fit">
                      [<a href="#">edit</a>]
                      [<a href="#">delete</a>]
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </x-card>
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
