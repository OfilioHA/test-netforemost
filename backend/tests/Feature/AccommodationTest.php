<?php

namespace Tests\Feature;

use App\Models\Accommodation;
use App\Models\AccommodationDetails;
use App\Models\AccommodationLocation;
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

    /**
     * Testing the amount equal with the csv.
     */
    public function test_accommodations_amount_location_details(): void
    {
        $accommodation = Accommodation::count();
        $location = AccommodationLocation::count();
        $details = AccommodationDetails::count();
        $equals = ($accommodation == $location &&  $accommodation == $details);
        $this->assertEquals($equals, true);
    }
}
