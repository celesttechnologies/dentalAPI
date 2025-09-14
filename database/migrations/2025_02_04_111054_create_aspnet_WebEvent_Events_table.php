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
        Schema::create('aspnet_WebEvent_Events', function (Blueprint $table) {
            $table->string('EventId', 32);
            $table->dateTime('EventTimeUtc');
            $table->dateTime('EventTime');
            $table->string('EventType', 256);
            $table->decimal('EventSequence', 19, 0);
            $table->decimal('EventOccurrence', 19, 0);
            $table->unsignedInteger('EventCode');
            $table->unsignedInteger('EventDetailCode');
            $table->string('Message', 1024)->nullable();
            $table->string('ApplicationPath', 256)->nullable();
            $table->string('ApplicationVirtualPath', 256)->nullable();
            $table->string('MachineName', 256);
            $table->string('RequestUrl', 1024)->nullable();
            $table->string('ExceptionType', 256)->nullable();
            $table->text('Details')->nullable();

            $table->primary(['EventId'], 'pk__aspnet_webevent___2a363cc5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspnet_WebEvent_Events');
    }
};
