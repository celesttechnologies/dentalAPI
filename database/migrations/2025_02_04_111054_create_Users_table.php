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
        Schema::create('Users', function (Blueprint $table) {
            $table->uuid('UserID')->default('newid()');
            $table->uuid('RoleID')->nullable();
            $table->uuid('ClientID')->nullable();
            $table->string('UserName', 50)->nullable();
            $table->string('Password', 50)->nullable();
            $table->string('Email', 150)->nullable();
            $table->string('Name', 50)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->string('Mobile', 10)->nullable();

            $table->primary(['UserID'], 'pk_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Users');
    }
};
