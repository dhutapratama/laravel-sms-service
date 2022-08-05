<?php

use Carbon\Carbon;

if(! function_exists("format_date")) {
  function format_date(Carbon $date) {
    return $date->format("Y-m-d H:i:s");
  }
}
