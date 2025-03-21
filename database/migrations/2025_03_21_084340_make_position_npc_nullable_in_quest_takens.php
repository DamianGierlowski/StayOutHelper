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
        Schema::table('quest_takens', function (Blueprint $table) {
            $table->string('position')->nullable()->change();
            $table->string('npc')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quest_takens', function (Blueprint $table) {
            $table->string('position')->change();
            $table->string('npc')->change();
        });
    }
};
