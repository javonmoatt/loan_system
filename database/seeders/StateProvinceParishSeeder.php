<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use App\Models\StateProvinceParish;
use App\Enums\StateProvinceParishType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StateProvinceParishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Get the United States country
         $unitedStates = Country::where('code', 'US')->first();

         $states = [
             [
                 'name' => 'California',
                 'type' => StateProvinceParishType::STATE->value,
                 'country_id' => $unitedStates->id,
             ],
             [
                 'name' => 'Ontario',
                 'type' => StateProvinceParishType::PROVINCE->value,
                 'country_id' => $unitedStates->id,
             ],
             [
                 'name' => 'Kingston',
                 'type' => StateProvinceParishType::PARISH->value,
                 'country_id' => $unitedStates->id,
             ],
             // Add more states/provinces/parishes as needed
         ];

         foreach ($states as $state) {
             StateProvinceParish::create($state);
         }
    }
}
