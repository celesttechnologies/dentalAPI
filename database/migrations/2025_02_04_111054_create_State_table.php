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
        Schema::create('State', function (Blueprint $table) {
            $table->increments('StateID');
            $table->unsignedInteger('CountryID');
            $table->string('StateCode', 50);
            $table->string('StateDesc', 50);

            $table->primary(['StateID'], 'pk_state');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('State');
    }
};
