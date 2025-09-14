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
        Schema::create('aspnet_Users', function (Blueprint $table) {
            $table->uuid('ApplicationId');
            $table->uuid('UserId')->default('newid()');
            $table->string('UserName', 256);
            $table->string('LoweredUserName', 256);
            $table->string('MobileAlias', 16)->nullable();
            $table->boolean('IsAnonymous')->default(false);
            $table->dateTime('LastActivityDate');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('ClientID')->nullable();

            $table->primary(['UserId'], 'pk__aspnet_users__4db4832c');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspnet_Users');
    }
};
