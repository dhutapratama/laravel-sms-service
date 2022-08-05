<?php

namespace App\Libraries\Commands;

use App\Models\Outbox;
use App\Models\Sent;

/**
 * Meregistrasikan device kedalam database
 */
class Delivery
{
    private $command = "delivery";
    public function __construct($data = null)
    {
        $outbox = Sent::find($data->id);
        if(!$outbox)
            return;

        $outbox->status_delivery = $data->status;
        $outbox->save();
    }
}
