<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use App\Models\AccommodationDetails;
use App\Models\AccommodationLocation;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileContent = file('database/data.csv');

        foreach ($fileContent as $index => $line) {
            if (!$index) continue;
            $row = str_getcsv($line);
            // Save Accommodation
            $accommodation = self::formatAccommodation($row);
            $accommodation = new Accommodation($accommodation);
            $accommodation->save();
            // Save Location
            $location = self::formatLocation($row);
            $location = new AccommodationLocation($location);
            $accommodation->location()->save($location);
            // Save Details
            $details = self::formatDetails($row);
            $details = new AccommodationDetails($details);
            $accommodation->location()->save($details);
        }
    }

    public static function formatAccommodation($row)
    {
        try {
            $date = Carbon::createFromFormat('Y/m/d', $row[28]);
        } catch (\Carbon\Exceptions\InvalidFormatException) {
            $date = null;
        }

        return [
            'original_id' => (int) $row[2],
            'title' => $row[3],
            'advertiser' => $row[4],
            'description' => $row[5],
            'phones' => $row[7],
            'type' => $row[8],
            'price' => $row[9],
            'meter_price' => $row[10],
            'meters' => (int) $row[14],
            'built_in' => (!$row[20]) ? null : $row[20],
            'register_at' => $date,
            'useful_meters' => (int) $row[39],
        ];
    }

    public static function formatLocation($row)
    {
        return [
            'latitude' => $row[0],
            'longitude' => $row[1],
            'address' => $row[11],
            'province' => $row[12],
            'city' => $row[13],
            'street' => $row[29],
            'neighborhood' => $row[30],
            'district' => $row[31],
        ];
    }

    public static function formatDetails($row)
    {
        $heating = ($row[22] == 'TRUE') ? 'SI' : $row[22];

        return [
            // Variables Data
            'individual_heating' => $heating,
            'energetic_certification' => $row[23],
            // Numeric Data
            'plants' => (int) $row[41],
            'bedrooms' => (int) $row[15],
            'bathrooms' => (int) $row[16],
            'floor' => (int) $row[24],
            // Boolean Data
            'reformed' => self::formatBoolean($row[6]),
            'parking' => self::formatBoolean($row[17]),
            'second_hand' => self::formatBoolean($row[18]),
            'built_in_wardrobes' => self::formatBoolean($row[19]),
            'furnished' => self::formatBoolean($row[21]),
            'exterior' => self::formatBoolean($row[25]),
            'interior' => self::formatBoolean($row[26]),
            'elevator' => self::formatBoolean($row[27]),
            'terrace' => self::formatBoolean($row[32]),
            'storage_room' => self::formatBoolean($row[33]),
            'equipped_kitchen' => self::formatBoolean($row[34]),
            'air_conditioning' => self::formatBoolean($row[36]),
            'pool' => self::formatBoolean($row[37]),
            'garden' => self::formatBoolean($row[38]),
            'balcony' => self::formatBoolean($row[43]),
            'suitable_mobility' => self::formatBoolean($row[40]),
            'pets_allowed' => self::formatBoolean($row[42]),
        ];
    }

    public static function formatBoolean(string $value)
    {
        $value = strtolower($value);
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}
