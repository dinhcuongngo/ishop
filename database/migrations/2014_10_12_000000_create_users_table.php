<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\softDeletes;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('verified')->default(User::UNVERIFIED_USER);
            $table->string('verification_token');
            $table->string('admin')->default(User::REGULAR_USER);
            $table->string('role')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        //=>set id start from 10000
        DB::statement("ALTER TABLE users AUTO_INCREMENT = 10000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
