<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'region' => 'Yerevan',
        ]);
        DB::table('regions')->insert([
            'region' => 'Aragatsotn',
        ]);
        DB::table('regions')->insert([
            'region' => 'Ararat',
        ]);
        DB::table('regions')->insert([
            'region' => 'Armavir',
        ]);
        DB::table('regions')->insert([
            'region' => 'Gegharkunik',
        ]);
        DB::table('regions')->insert([
            'region' => 'Kotayk',
        ]);
        DB::table('regions')->insert([
            'region' => 'Lori',
        ]);
        DB::table('regions')->insert([
            'region' => 'Shirak',
        ]);
        DB::table('regions')->insert([
            'region' => 'Syunik',
        ]);

        DB::table('regions')->insert([
            'region' => 'Vayots Dzor',
        ]);
    }
}
