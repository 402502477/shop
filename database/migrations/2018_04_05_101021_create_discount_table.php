<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('discounts', function (Blueprint $table) {
            $table -> increments('id');
            $table -> char('number',20) -> comment('折扣编号') -> unique();
            $table -> string('name',50) -> comment('折扣名称');
            $table -> string('describes',255) -> comment('折扣描述');
            $table -> float('rate',8,2) -> comment('折扣率');
            $table -> unsignedTinyInteger('type') ->default(1) -> comment('折扣类型 1百分比 2固定金额');

            $table -> unsignedTinyInteger('status',false)->default(1);
            $table -> unsignedInteger('create_at')->nullable();
            $table -> unsignedInteger('update_at')->nullable();
            $table -> unsignedInteger('delete_at')->nullable();

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
        Schema::dropIfExists('discounts');
    }
}
