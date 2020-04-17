<?php

use Carbon\Carbon;


function diff4Human ($date) {
    return is_null($date) ? 'N/A' : Carbon::parse($date)->diffForHumans();
}

function toDateString ($date) {
    return is_null($date) ? 'N/A' : Carbon::parse($date)->toDateString();
}
