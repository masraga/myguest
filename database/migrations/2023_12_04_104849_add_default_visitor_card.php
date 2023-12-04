<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("visitor_cards", function($table){
            $table->dateTime("time_start")->useCurrent();
            $table->dateTime("time_end")->useCurrent();
            $table->boolean("is_approve")->default(false)->change();
            $table->boolean("is_exit")->default(false)->change();
            $table->dropColumn("timeStart");
            $table->dropColumn("timeEnd");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
