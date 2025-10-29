<?php

use App\Models\Media;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Media())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->enum('type', config('enums.media_types'));
            $table->string('name');
            $table->longText('src');
            $table->string('path');
            $table->enum('extension', config('enums.extensions'));
            $table->longText('description')->nullable();
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
        Schema::dropIfExists((new Media())->getTable());
    }
}
