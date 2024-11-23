<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vision_missions', function (Blueprint $table) {
            $table->id();
            $table->string('vision_title');
            $table->text('vision_content');
            $table->string('vision_image')->nullable();
            $table->string('mission_title');
            $table->text('mission_content');
            $table->string('mission_image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vision_missions');
    }
};