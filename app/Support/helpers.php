<?php

use Carbon\Carbon;


function diff4Human ($date) {
    return is_null($date) ? 'N/A' : Carbon::parse($date)->diffForHumans();
}
