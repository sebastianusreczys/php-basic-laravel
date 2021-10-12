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
            $table->string('nama', 255);
            $table->string('password', 255);
            $table->string('no_hp', 13);
            $table->date('tanggal_lahir');
            $table->string('email', 255)->unique();
            $table->string('jenis_kelamin');
            $table->string('no_ktp', 100);
            $table->string('foto', 100);
            $table->boolean('is_admin')->default(0);
            // $table->timestamps();
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
