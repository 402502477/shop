<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('stocks', function (Blueprint $table) {
            $table -> increments('id');
            $table -> char('number', 20)->comment('库存记录编号') -> unique();
            $table -> integer('pid',false,true)->comment('商品id');
            $table -> tinyInteger('type',false,true)->default(1)->comment('库存类型 1入库 2出库 3销售 4退货 5盘亏 6盘盈');
            $table -> integer('quantity',false,true)->default(1)->comment('库存记录数量');
            $table -> string('describe',255)->comment('库存记录描述');

            $table -> unsignedTinyInteger('status',false)->default(1);
            $table -> unsignedInteger('create_at')->nullable();
            $table -> unsignedInteger('update_at')->nullable();
            $table -> unsignedInteger('delete_at')->nullable();

            $table -> foreign('pid') -> references('id') -> on('products');
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
        Schema::dropIfExists('stocks');
    }
}
