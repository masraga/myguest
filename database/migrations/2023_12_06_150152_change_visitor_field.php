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
        Schema::table('visitors', function(Blueprint $table) {
            $table->renameColumn('card_id', 'visitor_card_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visitors', function(Blueprint $table) {
            $table->renameColumn('visitor_card_id', 'card_id');
        });
    }
};
