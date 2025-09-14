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
        Schema::create('ActivityInOutHeader', function (Blueprint $table) {
            $table->increments('ActivityHeaderId');
            $table->uuid('ClinicID');
            $table->unsignedInteger('ActivityNumber');
            $table->unsignedInteger('NoOfItems');
            $table->unsignedInteger('Quantity');
            $table->decimal('Amount', 19, 4);
            $table->string('ActivityType', 100);
            $table->dateTime('ActivityDate');
            $table->string('CreatedBy', 200);
            $table->dateTime('CreatedOn');
            $table->string('LastUpdatedBy', 200);
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->text('Comments');
            $table->boolean('IsDeleted')->default(false);
            $table->uuid('rowguid')->default('newid()');
            $table->uuid('PurchaseOrderHeaderId')->nullable();

            $table->primary(['ActivityHeaderId', 'ClinicID'], 'pk_activityinoutheader_1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ActivityInOutHeader');
    }
};
