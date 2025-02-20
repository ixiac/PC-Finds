<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id('refund_id'); // Auto-increment primary key
            $table->unsignedBigInteger('order_history_id');
            $table->unsignedBigInteger('account_id');
            $table->decimal('refund_amount', 10, 2);
            $table->string('refund_reason')->nullable();
            $table->string('refund_image')->nullable();
            $table->integer('refund_status')->default(1); // 1 = Waiting Request, 2 = Refunded, 3 = Refund Declined
            $table->timestamp('refund_date')->useCurrent(); // Auto-set timestamp for refund request
            
            // Foreign keys
            $table->foreign('order_history_id')->references('order_history_id')->on('order_history')->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('account')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('refunds');
    }
};

