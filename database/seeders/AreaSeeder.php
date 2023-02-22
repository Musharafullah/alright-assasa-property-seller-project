<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\AreaPhase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["name" => "DHA"],
            ["name" => "Bahria"],
            ["name" => "CDA"],
            ["name" => "Gulberg"],
        ];
        foreach ($data as $area) {
            $area["created_at"] = now();
            $area["updated_at"] = now();
        }

        Area::insert($data);

        $areas = Area::all();
        $phases_data = [];
        foreach ($areas as $area) {
            for ($i = 1; $i < 8; $i++) {
                $phases_data[] = [
                    "title" => $i,
                    "area_id" => $area->id,
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
            }
        }

        AreaPhase::insert($phases_data);
    }
}