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
        Schema::create('aspnet_Membership', function (Blueprint $table) {
            $table->uuid('ApplicationId');
            $table->uuid('UserId');
            $table->string('Password', 128);
            $table->unsignedInteger('PasswordFormat')->default(0);
            $table->string('PasswordSalt', 128);
            $table->string('MobilePIN', 16)->nullable();
            $table->string('Email', 256)->nullable();
            $table->string('LoweredEmail', 256)->nullable();
            $table->string('PasswordQuestion', 256)->nullable();
            $table->string('PasswordAnswer', 128)->nullable();
            $table->boolean('IsApproved');
            $table->boolean('IsLockedOut');
            $table->dateTime('CreateDate');
            $table->dateTime('LastLoginDate');
            $table->dateTime('LastPasswordChangedDate');
            $table->dateTime('LastLockoutDate');
            $table->unsignedInteger('FailedPasswordAttemptCount');
            $table->dateTime('FailedPasswordAttemptWindowStart');
            $table->unsignedInteger('FailedPasswordAnswerAttemptCount');
            $table->dateTime('FailedPasswordAnswerAttemptWindowStart');
            $table->text('Comment')->nullable();

            $table->primary(['UserId'], 'pk__aspnet_membershi__5deaeaf5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspnet_Membership');
    }
};
