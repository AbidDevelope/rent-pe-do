<?php

use App\Models\Religion;
use App\Models\Rent;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReligionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Religion())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('rent_id')->constrained((new Rent())->getTable());
            $table->boolean('islam')->default(false);
            $table->boolean('hindu')->default(false);
            $table->boolean('christian')->default(false);
            $table->boolean('bouddho')->default(false);
            $table->boolean('any')->default(false);
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
        Schema::dropIfExists((new Religion())->getTable());
    }
}
