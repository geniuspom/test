<?php

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
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',100)->unique();
            $table->string('password',32);
            $table->string('name',25);
            $table->string('surname',50);
            $table->string('nickname',10);
            $table->string('phone', 30);
            $table->string('id_card',13);
            $table->string('bank',3);
            $table->string('account_no',30);
            $table->string('education ',3);
            $table->string('reference',100);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('member');
    }
}
