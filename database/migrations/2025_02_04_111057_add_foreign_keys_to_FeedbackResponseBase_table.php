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
        Schema::table('FeedbackResponseBase', function (Blueprint $table) {
            $table->foreign(['FeedbackID'], 'FK_FeedbackResponseBase_FeedbackResponse')->references(['FeedbackID'])->on('FeedbackResponse')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('FeedbackResponseBase', function (Blueprint $table) {
            $table->dropForeign('FK_FeedbackResponseBase_FeedbackResponse');
        });
    }
};
