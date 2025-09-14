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
        Schema::create('PersonalReminderNotes', function (Blueprint $table) {
            $table->uuid('PersonalReminderNotesId')->default('newid()');
            $table->uuid('ReminderId')->nullable();
            $table->dateTime('NotesDate')->nullable();
            $table->text('Notes')->nullable();
            $table->boolean('IsDeleted')->default(false);
            $table->string('CreatedBy', 200);
            $table->dateTime('CreatedOn')->useCurrent();
            $table->string('LastUpdatedBy', 200);
            $table->dateTime('LastUpdatedOn')->useCurrent();

            $table->primary(['PersonalReminderNotesId'], 'pk_personalremindernotes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PersonalReminderNotes');
    }
};
