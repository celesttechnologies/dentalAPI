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
        Schema::create('EmailTemplatesTag', function (Blueprint $table) {
            $table->uuid('EmailTemplatesTagID')->default('newid()');
            $table->string('EmailTagCode', 50)->nullable();
            $table->text('EmailTagDescription')->nullable();
            $table->text('EmailTagQuery')->nullable();
            $table->boolean('IsDeleted')->nullable();

            $table->primary(['EmailTemplatesTagID'], 'pk_emailtemplatestag');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('EmailTemplatesTag');
    }
};
