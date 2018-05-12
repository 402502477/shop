<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table -> increments('id');
            $table -> char('number', 20)->comment('商品编号') -> unique();
            $table -> string('name',50)->unique()->comment('商品名称');
            $table -> string('description',255)->comment('商品描述');
            $table -> unsignedInteger('cid')->comment('商品类型id');
            $table -> float('sell_price',8,2)->default(0.00)->comment('销售价格');
            $table -> float('original_price',8,2)->default(0.00)->comment('商品原价');
            $table -> float('cost',8,2)->default(0.00)->comment('成本价');
            $table -> tinyInteger('status',false,true)->default(1);
            $table -> unsignedInteger('create_at')->nullable();
            $table -> unsignedInteger('update_at')->nullable();
            $table -> unsignedInteger('delete_at')->nullable();

            $table -> foreign('cid') -> references('id') -> on('product_categories');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('products');
    }
}
