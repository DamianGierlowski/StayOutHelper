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
        Schema::create('quest_takens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('fraction');
            $table->string('position');
            $table->integer('cooldown');
            $table->date('taken_date');
            $table->string('npc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quest_takens');
    }
};
