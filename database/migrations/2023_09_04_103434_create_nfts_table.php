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
        Schema::create('nfts', function (Blueprint $table) {
            $table->id();
            $table->string("title", 45);
            $table->string("artist", 45);
            $table->longtext("description");
            $table->string("adress", 255);
            $table->string("standard_token", 10);
            $table->float("price");
            $table->string("image", 255);
            $table->string("category", 255);
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('nfts');
        Schema::enableForeignKeyConstraints();
    }
};
