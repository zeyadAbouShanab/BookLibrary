<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('authors', 255);
            $table->text('description')->nullable();
            $table->date('released_at');
            $table->string('cover_image', 255)->nullable();
            $table->integer('pages');
            $table->string('language_code', 3)->default("hu");
            $table->string('isbn', 13);
            $table->integer('in_stock');
            $table->timestamps();

            $table->unique('isbn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
