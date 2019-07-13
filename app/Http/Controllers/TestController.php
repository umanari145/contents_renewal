<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\DispatchJobs;

class TestController extends Controller
{
    public function dispatch_queue()
    {
        DispatchJobs::dispatch();
    }
}
