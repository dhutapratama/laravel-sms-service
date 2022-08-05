<x-app-layout>
  <section class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card-windows">
          <div class="card-header">
            <div class="card-title">Users</div>
            <div class="card-toolbar">
              <button class="btn btn-sm btn-windows-close flex-column-fluid" type="button">
                <i data-feather="x" class="icon-windows"></i>
              </button>
            </div>
          </div>
          <div class="card-menu">
            <div class="btn-group btn-group-menu" role="group" aria-label="Small button group">
              <a href="#" class="btn btn-menu">New</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-windows-container">
              <table class="table table-windows">
                <thead>
                  <tr>
                    <td>ID</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>&nbsp;</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      [<a href="#">edit</a>]
                      [<a href="#">delete</a>]
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
</x-app-layout>
