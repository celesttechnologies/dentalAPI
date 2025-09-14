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
        Schema::create('PatientDocuments', function (Blueprint $table) {
            $table->uuid('PatientDocumentID');
            $table->uuid('PatientID');
            $table->uuid('DocumentID');
            $table->uuid('PatientTreatmentID')->nullable();

            $table->primary(['PatientDocumentID'], 'pk_patientdocuments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientDocuments');
    }
};
