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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->string('picture');
            $table->boolean('is_active')->default(0);
            $table->integer('role');
            $table->text('access');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('forgot_password', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('token');
            $table->bigInteger('token_expired');

        });

        Schema::create('activity_log', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('email');
            $table->string('action');
            $table->timestamps();

        });

        Schema::create('role_permissions', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('permission');
            $table->string('access');
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
        Schema::dropIfExists('forgot_password');
        Schema::dropIfExists('activity_log');
        Schema::dropIfExists('role_permissions');
    }
}
