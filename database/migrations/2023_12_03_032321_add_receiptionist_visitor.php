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
        Schema::table("visitor_cards", function($table){
            $table->foreignId("receiptionist_id");
            $table->foreign("receiptionist_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("visitor_cards", function($table){
            $table->dropForeign("visitor_cards_receiptionist_id_foreign");
            $table->dropColumn("receiptionist_id");
        });
    }
};
