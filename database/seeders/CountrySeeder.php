<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $countries = [
            [
                'name' => 'Jamaica',
                'code' => 'JM',
                'phone_code' => '+1876',
                'currency' => 'JMD',
                'currency_symbol' => '$',
                'region' => 'Americas',
                'subregion' => 'Caribbean',
            ],
            [
                'name' => 'United States',
                'code' => 'US',
                'phone_code' => '+1',
                'currency' => 'USD',
                'currency_symbol' => '$',
                'region' => 'Americas',
                'subregion' => 'Northern America',
            ],
            [
                'name' => 'Canada',
                'code' => 'CA',
                'phone_code' => '+1',
                'currency' => 'CAD',
                'currency_symbol' => '$',
                'region' => 'Americas',
                'subregion' => 'Northern America',
            ],
            // Add more countries as needed
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
