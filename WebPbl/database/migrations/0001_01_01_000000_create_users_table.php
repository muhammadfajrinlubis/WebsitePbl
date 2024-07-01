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
            $table->rememberToken();
            $table->date('tgl_lahir')->nullable();
            $table->string('tmp_lahir')->nullable();
            $table->string('gender')->nullable();
            $table->string('nm_ibu')->nullable();
            $table->date('tgl_lahir_ibu')->nullable();
            $table->string('tmp_lahir_ibu', 225)->nullable();
            $table->string('alamat')->nullable();
            $table->string('nm_ayah')->nullable();
            $table->date('tgl_lahir_ayah')->nullable();
            $table->string('tmp_lahir_ayah')->nullable();
            $table->integer('no_hp')->nullable();
            $table->string('profile', 100)->nullable();
            $table->tinyInteger('user_type')->default(2)->comment('1:Admin, 2:Anak');
            $table->timestamps();
            $table->tinyInteger('is_delete')->default(0);
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
