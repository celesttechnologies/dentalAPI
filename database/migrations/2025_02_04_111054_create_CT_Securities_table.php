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
        Schema::create('CT_Securities', function (Blueprint $table) {
            $table->increments('SecurityID');
            $table->string('ObjectType', 50)->nullable();
            $table->unsignedInteger('ObjectID')->nullable();
            $table->text('ObjectDetails')->nullable();
            $table->string('UserObjectID', 50)->nullable();
            $table->string('UserObjectType', 5)->nullable();
            $table->boolean('FullControl')->nullable()->default(false);
            $table->boolean('Write')->nullable();
            $table->boolean('Modify')->nullable()->default(false);
            $table->boolean('ReadExecute')->nullable()->default(false);
            $table->boolean('ListContent')->nullable()->default(false);
            $table->boolean('ReadOnly')->nullable()->default(false);
            $table->boolean('SpecialPermissions')->nullable()->default(false);
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('CreatedOn')->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();

            $table->primary(['SecurityID'], 'pk_ct_securities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CT_Securities');
    }
};
