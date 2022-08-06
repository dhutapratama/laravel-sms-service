<x-app-layout>
  <section class="container">
    <div class="row">
      <div class="col-12 col-md-9 col-xl-6">
        <div class="card card-windows">
          <div class="card-header">
            <div class="card-title">Users</div>
            <div class="card-toolbar">
              <button class="btn btn-sm btn-windows-close flex-column-fluid" type="button">
                <i data-feather="x" class="icon-windows"></i>
              </button>
            </div>
          </div>
          <div class="card-toolbox">
            <button class="btn btn-toolbar-app" type="button" title="Dashboard">
              <i data-feather="plus" class="icon icon-sm"></i>
            </button>
            <button class="btn btn-toolbar-app" type="button" title="Android Device">
              <i data-feather="minus" class="icon icon-sm"></i>
            </button>
          </div>
          <div class="card-body">
            <div class="table-windows-container">
              <table class="table table-windows">
                <thead>
                  <tr>
                    <td class="fit">ID#</td>
                    <td>Name</td>
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
          </div>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
