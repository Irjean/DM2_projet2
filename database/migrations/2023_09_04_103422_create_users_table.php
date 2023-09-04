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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamp("created_at");
            $table->string("name", 45);
            $table->string("email", 45);
            $table->string("password", 45);
            $table->string("wallet", 45)->nullable();
            $table->boolean("isAdmin")->nullable();
            $table->unsignedBigInteger("nft_id");
            $table->foreign('nft_id')->references('id')->on('users')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
