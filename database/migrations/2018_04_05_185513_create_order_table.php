<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('orders', function (Blueprint $table) {
            $table -> increments('id');
            $table -> unsignedInteger('uid') -> comment('操作员id');
            $table -> unsignedInteger('mid') -> comment('会员id') -> nullable();
            $table -> unsignedInteger('did') -> comment('折扣id') -> nullable();
            $table -> char('number',20) -> comment('订单编号') -> unique();
            $table -> text('order_info') -> comment('订单商品信息');
            $table -> float('current_price',11,2) ->default(0.00) -> comment('订单现价');
            $table -> float('original_price',11,2) ->default(0.00) -> comment('订单原价');
            $table -> float('profit',11,2) ->default(0.00) -> comment('订单总盈利');
            $table -> float('cost',11,2) ->default(0.00) -> comment('订单成本');
            $table -> unsignedSmallInteger('quantity') ->default(0) -> comment('订单商品总数');
            $table -> unsignedTinyInteger('type') -> comment('订单类型 1销售 2退货 ') ->defualt(1);
            $table -> unsignedTinyInteger('payment') -> comment('付款方式 1现金 2银联 3Ali Pay 4WeChat Pay 5other');

            $table -> unsignedTinyInteger('status',false)->default(1)->comment('1待支付 2已完成 3已退货 4已取消');
            $table -> unsignedInteger('create_at')->nullable();
            $table -> unsignedInteger('update_at')->nullable();
            $table -> unsignedInteger('delete_at')->nullable();

            $table -> foreign('uid') -> references('id') -> on('users');
            $table -> foreign('mid') -> references('id') -> on('members');
            $table -> foreign('did') -> references('id') -> on('discounts');

            $table -> index(['type','payment','status']);

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
        Schema::dropIfExists('orders');
    }
}
