<x-app-layout>

  <section class="container">
    <div class="row">
      <div class="col-12 col-md-9 col-lg-9">
        <x-card.windows>
          <x-slot name="title">Phone</x-slot>
          <x-slot name="toolbox">
            <button class="btn btn-toolbar-app" type="button" title="New" data-bs-toggle="modal" data-bs-target="#new">
              <i data-feather="plus" class="icon icon-sm"></i>
            </button>
          </x-slot>
          <div class="table-windows-container">
            <table class="table table-windows">
              <thead>
                <tr>
                  <td class="fit">ID#</td>
                  <td class="fit">Destination</td>
                  <td>Text</td>
                  <td class="fit">Device</td>
                  <td class="fit">Status</td>
                  <td class="fit">Created At</td>
                  <td class="fit">&nbsp;</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($phones as $phone)
                  <tr>
                    <td class="fit">{{ $outbox->id }}</td>
                    <td class="fit">{{ $outbox->destination_number }}</td>
                    <td>{{ $outbox->text }}</td>
                    <td class="fit">{{ $outbox->phone->device }}</td>
                    <td class="fit">{{ $outbox->status }}</td>
                    <td class="fit">{{ format_date($outbox->created_at) }}</td>
                    <td class="fit">[edit] [delete]</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </x-card.windows>
      </div>
    </div>
  </section>
  <x-modal.windows id="new" label="newPhone" title="Connect Phone" :isform="true">
    <x-slot name="form" method="POST" action="{{ route('phone') }}"></x-slot>
    <x-slot name="content">
      <code>
        1. TUTORIAL
      </code>
    </x-slot>
    <x-slot name="action">
      <button type="button" class="btn btn-toolbar" data-bs-dismiss="modal" aria-label="Close">Close</button>
    </x-slot>
    <x-slot name="footer">
      <div class="statusbar flex-grow-1">
        <div class="flex-fill">Add phone by connecting to the server.</div>
      </div>
    </x-slot>
  </x-modal.windows>
</x-app-layout>
