<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenseMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license_member', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('license_id');
            $table->integer('member_id');
            $table->date('valid_from');
            $table->softDeletes();
            $table->timestamps();

            // Da errore durante la migrazione
            //$table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license_member');
    }
}
