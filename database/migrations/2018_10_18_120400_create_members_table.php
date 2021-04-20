<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->integer('nip')->nullable();;
            $table->string('firstname',100);
            $table->string('lastname',100);
            $table->string('title',50);
            $table->string('address',100);
            $table->integer('zip');
            $table->string('city',100);
            $table->string('phone',50)->nullable();;
            $table->string('mobile',100);
            $table->string('work',100)->nullable();;
            $table->date('birthdate');
            $table->date('registration');
            $table->integer('school_id');
            $table->string('password');
            $table->softDeletes();
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
        Schema::dropIfExists('members');
    }
}
