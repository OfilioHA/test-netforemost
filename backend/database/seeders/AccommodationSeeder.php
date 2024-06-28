<?php

namespace Database\Seeders;

use App\Models\Accommodation;
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
            $accommodation = self::formatAccommodation($row);
            $accommodation = new Accommodation($accommodation);
            $accommodation->save();
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
}
