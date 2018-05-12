<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table -> increments('id');
            $table -> unsignedInteger('rid')->comment('规则id')->default(1);
            $table -> string('name',50)->unique()->comment('用户名');
            $table -> string('password');
            $table -> string('email',100)->unique()->comment('邮箱地址');
            $table -> text('config') -> comment('系统配置信息') -> nullable();
            $table -> text('info') -> comment('用户基本信息') -> nullable();
            $table -> string('login_ip',20)->comment('登陆IP地址')->default(0);

            $table -> unsignedTinyInteger('status',false)->default(1);
            $table -> unsignedInteger('create_at')->nullable();
            $table -> unsignedInteger('update_at')->nullable();
            $table -> unsignedInteger('delete_at')->nullable();
            $table -> rememberToken();
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
        Schema::dropIfExists('users');
    }
}
