<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\Controller;
use App\Models\Outbox;
use Illuminate\Http\Request;

class OutboxController extends Controller
{
  public function index()
  {
    $datas = Outbox::orderBy('id', 'desc')->get();
    return view('pages.outbox.index', ['outboxes' => $datas]);
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
