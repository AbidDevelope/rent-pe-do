<?php

use App\Models\ForRent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBussinessmanColumnToForRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table((new ForRent())->getTable(), function (Blueprint $table) {
            $table->boolean('businessman')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table((new ForRent())->getTable(), function (Blueprint $table) {
            $table->dropColumn('businessman');
        });
    }
}
