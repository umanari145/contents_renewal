<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Model\Payment;

class PaymentTest extends TestCase
{
    public function setup()
    {
        parent::setUp();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $payment = new Payment();
        $payment->getCustomerPaymentDataGroupBy();
    }

    public function tearDown()
    {
        parent::tearDown();
    }
}
