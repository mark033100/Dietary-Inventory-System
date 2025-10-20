<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            // Weight
            ['name' => 'Kilogram', 'symbol' => 'kg', 'category' => 'weight'],
            ['name' => 'Gram', 'symbol' => 'g', 'category' => 'weight'],
            ['name' => 'Milligram', 'symbol' => 'mg', 'category' => 'weight'],
            ['name' => 'Ounce', 'symbol' => 'oz', 'category' => 'weight'],
            ['name' => 'Pound', 'symbol' => 'lb', 'category' => 'weight'],

            // Volume
            ['name' => 'Liter', 'symbol' => 'L', 'category' => 'volume'],
            ['name' => 'Milliliter', 'symbol' => 'mL', 'category' => 'volume'],
            ['name' => 'Cup', 'symbol' => 'cup', 'category' => 'volume'],
            ['name' => 'Pinch', 'symbol' => 'pinch', 'category' => 'volume'],

            // Count / Portion
            ['name' => 'Piece', 'symbol' => 'pc', 'category' => 'count'],
            ['name' => 'Dozen', 'symbol' => 'dozen', 'category' => 'count'],
            ['name' => 'Slice', 'symbol' => 'slice', 'category' => 'portion'],
            ['name' => 'Serving', 'symbol' => 'serving', 'category' => 'portion'],

            // Containers / Packaging
            ['name' => 'Pack', 'symbol' => 'pack', 'category' => 'container'],
            ['name' => 'Bottle', 'symbol' => 'bottle', 'category' => 'container'],
            ['name' => 'Can', 'symbol' => 'can', 'category' => 'container'],
            ['name' => 'Box', 'symbol' => 'box', 'category' => 'container'],
            ['name' => 'Sack', 'symbol' => 'sack', 'category' => 'container'],
            ['name' => 'Tray', 'symbol' => 'tray', 'category' => 'container'],
        ];

        foreach ($units as &$unit) {
            $unit['created_at'] = Carbon::now();
            $unit['updated_at'] = Carbon::now();
        }

        DB::table('units')->insert($units);
    }
}
