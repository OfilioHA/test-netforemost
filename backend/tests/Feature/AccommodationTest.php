<?php

namespace Tests\Feature;

use App\Models\Accommodation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccommodationTest extends TestCase
{
    const EXPECTED_AMOUNT = 52;

    /**
     * Testing the amount equal with the csv.
     */
    public function test_accommodations_amount(): void
    {
        $amount = Accommodation::count();
        $this->assertEquals(self::EXPECTED_AMOUNT, $amount);
    }
}
