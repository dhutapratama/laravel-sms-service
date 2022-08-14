<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
  public function index(Request $r): View
  {
    $phones = $r->user()->phones();
    return view('pages.phone.index', compact('phones'));
  }
}
