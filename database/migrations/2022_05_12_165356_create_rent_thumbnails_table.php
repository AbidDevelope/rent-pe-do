<?php

use App\Models\Media;
use App\Models\Rent;
use App\Models\RentThumbnail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentThumbnailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new RentThumbnail())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('rent_id')->constrained((new Rent())->getTable());
            $table->foreignId('media_id')->constrained((new Media())->getTable());
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
        Schema::dropIfExists((new RentThumbnail())->getTable());
    }
}
