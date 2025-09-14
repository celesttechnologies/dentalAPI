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
        Schema::create('ClinicSearchAgents', function (Blueprint $table) {
            $table->uuid('SearchAgentID');
            $table->uuid('ClinicID');
            $table->string('AgentName', 50)->nullable();
            $table->unsignedInteger('AgentPurposeID')->nullable()->comment('1:> PatientSearch. 
');
            $table->text('AgentDetails')->nullable();
            $table->boolean('IsDeleted')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();

            $table->primary(['SearchAgentID'], 'pk_clinicsearchagents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ClinicSearchAgents');
    }
};
