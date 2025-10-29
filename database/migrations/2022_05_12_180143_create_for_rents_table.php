<?php

use App\Models\Rent;
use App\Models\ForRent;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new ForRent())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('rent_id')->constrained((new Rent())->getTable());
            $table->boolean('male_student')->default(false);
            $table->boolean('female_student')->default(false);
            $table->boolean('man_job')->default(false);
            $table->boolean('women_job')->default(false);
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
        Schema::dropIfExists((new ForRent())->getTable());
    }
}
