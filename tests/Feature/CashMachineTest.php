<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CashMachineTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_valid_cash_transaction()
    {
        $response = $this->post('/transaction', [
            '1' => 5,
            '5' => 2,
            // ... other cash denominations
        ]);

        $response->assertStatus(200); // Or other expected status code
        // Add more assertions to check database or returned content
    }
}
