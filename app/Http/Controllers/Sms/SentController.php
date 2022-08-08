<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\Controller;
use App\Models\Sent;
use Illuminate\Http\Request;

//
class SentController extends Controller
{
  public function index()
  {
    $datas = Sent::orderBy('id', 'desc')->get();
    return view('pages.sent.index', ['sents' => $datas]);
  }

  public function delete(Request $r, int $id)
  {
    $data = Sent::findById($id);

    if (!$data) {
      return redirect()->back()->withErrors("Not Found");
    }

    $data->delete();
    return redirect()->back()->with('success', "Deleted");
  }
}
