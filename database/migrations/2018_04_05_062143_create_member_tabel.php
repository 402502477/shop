<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('members', function (Blueprint $table) {
            $table -> increments('id');
            $table -> char('number',20)->comment('会员编号') -> unique();
            $table -> string('name',50)->comment('会员名称');
            $table -> text('info')->comment('会员信息');

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
        Schema::dropIfExists('members');
    }
}
