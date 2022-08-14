<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Outbox;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OutboxController extends Controller
{
  public function index(Request $r)
  {
    $user = $r->user();
    $phones = $user->phones();
    $outboxes = $user->outboxes();

    return view('pages.outbox.index', compact('phones', 'outboxes'));
  }


  /**
   * Create or update data to database.
   *
   * @param Request $r
   * @return RedirectResponse
   */
  public function save(Request $r): RedirectResponse
  {
    $user = $r->user();
    $phone = $user->phones()->find($r->post('phone_id'));
    if (!$phone) {
      return redirect()->back()->withErrors("phone not found.");
    }

    $outbox = $user->outboxes()->find($r->post('id'));
    if (!$outbox) {
      $outbox = new Outbox;
      $outbox->phone()->associate($phone);
    }

    // Inject value to models.
    $outbox->destination_number = $r->destination_number;
    $outbox->text               = $r->text;
    $outbox->status             = "new";
    $outbox->save();

    return redirect(route('sms.outbox'));
  }


  public function delete(Request $r, int $id)
  {
    $data = Outbox::findById($id);

    if (!$data) {
      return redirect()->back()->withErrors("Not Found");
    }

    $data->delete();
    return redirect()->back()->with('success', "Deleted");
  }
}
