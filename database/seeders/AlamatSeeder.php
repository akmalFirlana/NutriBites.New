<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AlamatSeeder extends Seeder
{
    public function run()
    {
        $file = fopen(storage_path('app/full.csv'), 'r');
        $isFirstRow = true;

        while (($row = fgetcsv($file, 1000, ',')) !== FALSE) {
            if ($isFirstRow) {
                $isFirstRow = false;
                continue; // Skip header row
            }

            DB::table('alamat')->insert([
                'postal_id' => $row[0],
                'subdis_id' => $row[1],
                'dis_id' => $row[2],
                'city_id' => $row[3],
                'prov_id' => $row[4],
                'postal_code' => $row[5],
                'subdis_name' => $row[6],
                'dis_name' => $row[7],
                'city_name' => $row[8],
                'prov_name' => $row[9],
            ]);
        }

        fclose($file);
    }
}
