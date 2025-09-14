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
        Schema::create('SMSTemplatesTag', function (Blueprint $table) {
            $table->uuid('SMSTemplatesTagID')->default('newid()');
            $table->string('SMSTagCode', 50)->nullable();
            $table->text('SMSTagDescription')->nullable();
            $table->text('DefaultValue')->nullable();
            $table->text('SMSTagQuery')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);

            $table->primary(['SMSTemplatesTagID'], 'pk_smstemplatestag');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SMSTemplatesTag');
    }
};
