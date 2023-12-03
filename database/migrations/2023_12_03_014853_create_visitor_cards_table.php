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
        Schema::create('visitor_cards', function (Blueprint $table) {
            $table->id();
            $table->string("card_id");
            $table->string("face");
            $table->dateTime("timeStart");
            $table->dateTime("timeEnd");
            $table->boolean("is_approve")->nullable();
            $table->boolean("is_exit");
            $table->timestamps();  

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_cards');
    }
};
