<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('url');
            $table->string('title');
            $table->string('author')->nullable();
            $table->text('story');
            $table->json('media_materials');
            $table->unique('url', 'url_uniquex');
            $table->unique(['uuid', 'url'], 'uuid_url_uniquex');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
