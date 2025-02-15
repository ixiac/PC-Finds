<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->text('username')->unique();
            $table->text('password');
            $table->integer('role')->default(1);
            $table->text('first_name');
            $table->text('last_name');
            $table->text('email')->unique();
            $table->char('sex');
            $table->text('contact_number')->nullable();
            $table->text('address')->nullable();
            $table->timestamp('date_created')->useCurrent();
            $table->text('image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
