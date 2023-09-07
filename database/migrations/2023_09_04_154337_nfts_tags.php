<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nfts_tags', function (Blueprint $table) {
            $table->unsignedBigInteger("nft_id")->nullable();
            $table->unsignedBigInteger("tag_id")->nullable();
            $table->foreign("nft_id")->references("id")->on("nfts")->nullable();
            $table->foreign("tag_id")->references("id")->on("tags")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('nfts_tags');
        Schema::enableForeignKeyConstraints();
    }
};
