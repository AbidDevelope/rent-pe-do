<?php

use App\Models\Cost;
use App\Models\Rent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Cost())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('rent_id')->constrained((new Rent())->getTable());
            $table->float('rent_price')->nullable();
            $table->float('electric')->nullable();
            $table->float('water')->nullable();
            $table->float('gas')->nullable();
            $table->float('service')->nullable();
            $table->boolean('negotiable')->default(false);
            $table->float('others')->nullable();
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
        Schema::dropIfExists((new Cost())->getTable());
    }
}
