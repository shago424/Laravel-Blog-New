<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->id();
            $table->integer('role_id')->default(2);
            $table->string('user_id')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('about')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('ocap')->nullable();
            $table->string('image')->default('default.jpg');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyinteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updted_by')->nullable();
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
        Schema::dropIfExists('users');
    }
}
