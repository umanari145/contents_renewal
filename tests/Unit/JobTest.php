<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Jobs\DispatchJobs;

class JobTest extends TestCase
{
    public $item;

    public function setup()
    {
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        DispatchJobs::dispatch();
    }

    public function tearDown()
    {
    }
}
