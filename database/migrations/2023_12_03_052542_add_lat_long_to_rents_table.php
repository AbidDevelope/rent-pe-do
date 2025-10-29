<?php

use App\Models\Rent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatLongToRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table((new Rent())->getTable(), function (Blueprint $table) {
            $table->string('latitude')->nullable()->after('is_active');
            $table->string('longitude')->nullable()->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table((new Rent())->getTable(), function (Blueprint $table) {
            $table->dropColumn('longitude', 'latitude');
        });
    }
}
