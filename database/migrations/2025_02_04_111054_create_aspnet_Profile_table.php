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
        Schema::create('aspnet_Profile', function (Blueprint $table) {
            $table->uuid('UserId');
            $table->text('PropertyNames');
            $table->text('PropertyValuesString');
            $table->binary('PropertyValuesBinary');
            $table->dateTime('LastUpdatedDate');

            $table->primary(['UserId'], 'pk__aspnet_profile__72e607db');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspnet_Profile');
    }
};
