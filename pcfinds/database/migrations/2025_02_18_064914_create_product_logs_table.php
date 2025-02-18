<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductLogsTable extends Migration
{
    public function up()
    {
        Schema::create('product_logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->integer('product_id');
            $table->integer('restocked_by');
            $table->integer('quantity_restocked');
            $table->timestamp('date_restocked')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_logs');
    }
}
