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
        Schema::create('PatientConsentDetails', function (Blueprint $table) {
            $table->uuid('ConsentID');
            $table->uuid('PatientID');
            $table->uuid('ProviderID');
            $table->unsignedInteger('ConsentTypeID')->nullable()->default(1)->comment('1:>Self. 
2:> Relative/On Behalf. ');
            $table->dateTime('ConsentDate')->useCurrent();
            $table->text('CPName')->nullable()->comment('Concerned Person\'s Name');
            $table->text('CPRelation')->nullable()->comment('Concerned Person\'s Relation');
            $table->text('CPContact')->nullable()->comment('Concerned Person\'s Contact No.');
            $table->decimal('Advance', 19, 4)->nullable();
            $table->decimal('Total', 19, 4)->nullable()->default(0);
            $table->text('Installment')->nullable();
            $table->boolean('IsDeleted')->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->text('CreatedBy')->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->text('LastUpdatedBy')->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->unsignedInteger('ProcedureTypeID')->nullable()->comment('1:>Dental. 2:>Surgical. 3:>Special Procedure');
            $table->text('ProcedureName')->nullable();

            $table->primary(['ConsentID'], 'pk_patientconsentdetails');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientConsentDetails');
    }
};
