<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonString = file_get_contents("../nft.json");
        $jsonData = json_decode($jsonString);

        foreach($jsonData as $data)
        {
            DB::table("nfts")->insert([
                "title" => $data->titre,
                "artist" => $data->artiste,
                "description" => $data->description,
                "adress" => $data->adresse,
                "standard_token" => $data->standard,
                "price" => $data->prix,
                "image" => $data->fichier,
            ]);
        }

        for($i = 1; $i < 6; $i++){
             DB::table("nfts")->where("id", $i)->update(["user_id" => $i]);
        }


    }
}
