<?php

namespace Database\Seeders;

use App\Models\ZipPostalCode;
use Illuminate\Database\Seeder;
use App\Models\StateProvinceParish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ZipPostalCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get California state
        $california = StateProvinceParish::where('name', 'California')->first();

        $zipCodes = [
            [
                'code' => '90210',
                'name' => '',
                'state_province_parish_id' => $california->id,
            ],
            [
                'code' => '90210',
                'name' => 'Beverly Hills',
                'state_province_parish_id' => $california->id,
            ],
            [
                'code' => '90001',
                'name' => 'Los Angeles',
                'state_province_parish_id' => $california->id,
            ],
            // Add more ZIP/postal codes as needed
        ];

        foreach ($zipCodes as $zipCode) {
            ZipPostalCode::create($zipCode);
        }
    }
}
