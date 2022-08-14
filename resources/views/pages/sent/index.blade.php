<x-app-layout>

  <section class="container">
    <div class="row">
      <div class="col-12 col-md-9 col-lg-9">
        <x-card.windows>
          <x-slot name="title">Sent</x-slot>
          <div class="table-windows-container">
            <table class="table table-windows">
              <thead>
                <tr>
                  <td class="fit">ID#</td>
                  <td class="fit">Input Date</th>
                  <td class="fit">Destination</td>
                  <td>Text</td>
                  <td class="fit">Device</td>
                  <td class="fit">Status Sent</td>
                  <td class="fit">Status Delivery</td>
                  <td class="fit">Sent At</td>
                  <td class="fit">&nbsp;</td>
                </tr>
              </thead>
              <tbody>
                @foreach($sents as $sent)
                <tr>
                  <td class="fit">{{ $sent->id }}</td>
                  <td class="fit">{{ format_date($sent->insert_at) }}</td>
                  <td class="fit">{{ $sent->destination_number }}</td>
                  <td>{{ $sent->text }}</td>
                  <td class="fit">{{ $sent->phone->device }}</td>
                  <td class="fit">{{ $sent->status_sent }}</td>
                  <td class="fit">{{ $sent->status_delivery }}</td>
                  <td class="fit">{{ format_date($sent->created_at) }}</td>
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

</x-app-layout>
