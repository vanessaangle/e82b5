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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',50);
            $table->text('alamat');
            $table->string('telepon',15);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir',50);
            $table->string('username',50)->unique();
            $table->string('password');
            $table->boolean('status')->default(1);
            $table->string('role',20);
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
        Schema::dropIfExists('user');
    }
}
