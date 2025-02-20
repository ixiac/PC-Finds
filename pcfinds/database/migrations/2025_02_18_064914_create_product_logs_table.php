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
            $table->text('product_name');
            $table->text('category_name');
            $table->text('restocked_by');
            $table->integer('quantity_in_stock');
            $table->integer('quantity_added');
            $table->integer('quantity_total');
            $table->timestamp('date_restocked')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_logs');
    }
}
