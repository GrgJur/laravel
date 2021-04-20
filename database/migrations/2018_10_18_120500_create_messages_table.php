<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // select * from messages where member_id = 1 and instructor = 1 

        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title'); // ciao Damir -  ciao Jure
            $table->integer('member_id'); // from Jure // Damir
            $table->integer('instructor_id'); // to Damir // Jure
            $table->string('sent');
            $table->text('text');
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
        Schema::dropIfExists('messages');
    }
}
