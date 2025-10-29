<?php

use App\Models\Rent;
use App\Models\Facility;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Facility())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('rent_id')->constrained((new Rent())->getTable());
            $table->boolean('lift')->default(false);
            $table->boolean('generator')->default(false);
            $table->boolean('guard')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('gas')->default(false);
            $table->boolean('internet')->default(false);
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
        Schema::dropIfExists((new Facility())->getTable());
    }
}
