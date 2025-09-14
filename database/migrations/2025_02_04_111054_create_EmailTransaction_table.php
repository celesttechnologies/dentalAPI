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
        Schema::create('EmailTransaction', function (Blueprint $table) {
            $table->uuid('EmailTransactionID')->default('newid()');
            $table->uuid('ClinicIID')->nullable();
            $table->uuid('PatientID')->nullable();
            $table->unsignedInteger('EmailTypeID')->nullable();
            $table->text('EmailTo')->nullable();
            $table->string('EmailFrom', 50)->nullable();
            $table->text('EmailCC')->nullable();
            $table->text('EmailBcc')->nullable();
            $table->text('Subject')->nullable();
            $table->text('MessageText')->nullable();
            $table->uuid('EmailAttachmentsID')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->unsignedInteger('Status')->nullable();
            $table->dateTime('SentOn')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->text('EmailFromName')->nullable();
            $table->text('EmailToName')->nullable();
            $table->dateTime('ScheduledOn')->nullable();

            $table->primary(['EmailTransactionID'], 'pk_emailtransaction');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('EmailTransaction');
    }
};
