<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverAssignmentAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_assignment_attachments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assignment_id');
            $table->unsignedBigInteger('attachment_id');
            $table->unsignedBigInteger('driver_id');
            $table->integer('score')->nullable();
            $table->enum("status", ["akses", "selesai"]);
            
            $table->foreign('assignment_id')->on('assignments')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('driver_id')->on('drivers')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('attachment_id')->on('attachments')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('driver_assignment_attachments');
    }
}
