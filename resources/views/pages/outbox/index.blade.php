<x-app-layout>

  <section class="container">
    <div class="row">
      <div class="col-12 col-md-9 col-lg-9">
        <x-card>
          <x-slot name="title">Sent</x-slot>
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
                @foreach($outboxes as $outbox)
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
        </x-card>
      </div>
    </div>
  </section>

</x-app-layout>
