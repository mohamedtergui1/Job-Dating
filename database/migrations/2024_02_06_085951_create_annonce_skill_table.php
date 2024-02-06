<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnonceSkillTable extends Migration
{
    public function up()
    {
        Schema::create('annonce_skill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('annonce_id');
            $table->unsignedBigInteger('skill_id'); 
            $table->timestamps();
            $table->foreign('annonce_id')->references('id')->on('annonces')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('annonce_skill');
    }
}
