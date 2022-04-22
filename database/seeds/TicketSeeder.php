<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            'title' => Str::random(10),
            'content' => Str::random(20),
            'date' => '2010-10-10',
            'price' => 10,
            'count' => 10,
            'gid_id' => 1,
        ]);
    }
}
