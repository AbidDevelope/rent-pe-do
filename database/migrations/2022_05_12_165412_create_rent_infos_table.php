<?php

use App\Models\Area;
use App\Models\City;
use App\Models\Rent;
use App\Models\RentInfo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new RentInfo())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('rent_id')->constrained((new Rent())->getTable());
            $table->date('available_from');
            $table->string('month');
            $table->foreignId('city_id')->constrained((new City())->getTable());
            $table->foreignId('area_id')->constrained((new Area())->getTable());
            $table->string('address');
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
        Schema::dropIfExists((new RentInfo())->getTable());
    }
}
