<?php

namespace App\Libraries\Commands;

use App\Models\Outbox;

/**
 * Meregistrasikan device kedalam database
 */
class Sent
{
    private $command = "sent";
    public function __construct($data = null)
    {
        $outbox = Outbox::find($data->id);

        if(!isset($data->status)) {
            $outbox->status = "blocked";
            $outbox->save();
        }
        elseif($data->status == "sent") {
            \App\Models\Sent::create([
                "id" => $outbox->id,
                "insert_at" => $outbox->created_at,
                "phone_id" => $outbox->phone_id,
                "destination_number" => $outbox->destination_number,
                "text" => $outbox->text,
                "status_sent" => $data->status,
                "status_delivery" => "N/A",
            ]);
            $outbox->delete();
        } else {
            $outbox->status = $data->status;
            $outbox->save();
        }
    }
}
