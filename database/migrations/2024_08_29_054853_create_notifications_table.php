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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id');
            $table->foreignId('receiver_id');
            $table->foreignId('form_id');
            $table->enum('form_type', ['1', '2','3','4','5'])->comment('1- State monthly report, 2- L-form, 3- P-form, 4- Investigate form, 5- laboratory user');
            $table->enum('status', ['0', '1', '2'])->comment('0- Pending, 1- Approved, 2- Returned')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
