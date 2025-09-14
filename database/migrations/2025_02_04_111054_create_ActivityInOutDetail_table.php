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
        Schema::create('ActivityInOutDetail', function (Blueprint $table) {
            $table->increments('ActivityDetailId');
            $table->unsignedInteger('ActivityHeaderId');
            $table->uuid('ItemId');
            $table->unsignedInteger('Quantity');
            $table->decimal('Price', 19, 4);

            $table->primary(['ActivityDetailId'], 'pk_activityinoutdetail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ActivityInOutDetail');
    }
};
