<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ["collectible", "metaverse", "utility", "online video game"];

        foreach($tags as $tag)
        {
            DB::table("tags")->insert([
                "name" => $tag
            ]);
        }

    }
}
