<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('school_name');
            $table->text('subtitle');
            $table->string('background_image')->nullable();
            $table->string('primary_button_text');
            $table->string('primary_button_link');
            $table->string('secondary_button_text');
            $table->string('secondary_button_link');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hero_sections');
    }
};