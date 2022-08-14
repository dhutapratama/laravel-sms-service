<x-app-layout>

  <section class="container">
    <div class="row">
      <div class="col-12 col-md-9 col-lg-9">
        <x-card.windows>
          <x-slot name="title">Outbox</x-slot>
          <x-slot name="toolbox">
            <button class="btn btn-toolbar-app" type="button" title="New" data-bs-toggle="modal" data-bs-target="#new">
              <i data-feather="plus" class="icon icon-sm"></i>
            </button>
            <button class="btn btn-toolbar-app" type="button" title="Import .csv" data-bs-toggle="modal" data-bs-target="#import">
              <i data-feather="download" class="icon icon-sm"></i>
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
                @foreach ($outboxes as $outbox)
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
  <x-modal.windows id="new" label="newOutbox" title="Create New: Outbox" :isform="true">
    <x-slot name="form" method="POST" action="{{ route('sms.outbox') }}"></x-slot>
    <x-slot name="content">
      <div class="row g-1 mb-1">
        <div class="col-3 windows-label">
          <label for="name" class="form-label">Sender: </label>
        </div>
        <div class="col-9">
          <select name="vpn_server" id="vpn_server" class="form-select">
            @foreach ($phones as $phone)
              <option value="{{ $phone->id }}">{{ $phone->brand }}/{{ $phone->device_id }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row g-1 mb-1">
        <div class="col-3 windows-label">
          <label for="destination_number" class="form-label">Dst. Number: </label>
        </div>
        <div class="col-9">
          <input type="text" class="form-control" id="destination_number" name="destination_number" value="" placeholder="08xx or +628xx" required>
        </div>
      </div>
      <div class="row g-1 mb-1">
        <div class="col-3 windows-label">
          <label for="text" class="form-label">Text: </label>
        </div>
        <div class="col-9">
          <textarea name="text" id="text" class="form-control" rows="10"></textarea>
        </div>
      </div>
    </x-slot>
    <x-slot name="action">
      <button type="submit" class="btn btn-toolbar">Create</button>
      <button type="button" class="btn btn-toolbar" data-bs-dismiss="modal" aria-label="Close">Close</button>
    </x-slot>
    <x-slot name="footer">
      <div class="statusbar flex-grow-1">
        <div class="flex-fill">Create new sms.</div>
      </div>
    </x-slot>
  </x-modal.windows>
  <x-modal.windows id="import" label="importOutbox" title="Import: Outbox" :isform="true">
    <x-slot name="form" method="POST" action="{{ route('sms.outbox') }}"></x-slot>
    <x-slot name="content">
      <div class="row g-1 mb-1">
        <div class="col-3 windows-label">
          <label for="name" class="form-label">Sender: </label>
        </div>
        <div class="col-9">
          <select name="vpn_server" id="vpn_server" class="form-select">
            @foreach ($phones as $phone)
              <option value="{{ $phone->id }}">{{ $phone->brand }}/{{ $phone->device_id }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row g-1 mb-1">
        <div class="col-3 windows-label">
          <label for="destination_number" class="form-label">CSV: </label>
        </div>
        <div class="col-9">
          <input class="form-control" type="file" id="formFile" name="csv_file">
        </div>
      </div>
    </x-slot>
    <x-slot name="action">
      <button type="submit" class="btn btn-toolbar">Create</button>
      <button type="button" class="btn btn-toolbar" data-bs-dismiss="modal" aria-label="Close">Close</button>
    </x-slot>
    <x-slot name="footer">
      <div class="statusbar flex-grow-1">
        <div class="flex-fill">Create new sms.</div>
      </div>
    </x-slot>
  </x-modal.windows>
</x-app-layout>
