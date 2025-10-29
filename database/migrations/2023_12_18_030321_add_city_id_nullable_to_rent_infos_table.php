<?php

use App\Models\Area;
use App\Models\City;
use App\Models\RentInfo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCityIdNullableToRentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $datas = RentInfo::select('id','city_id','area_id')->get()->toArray();

        Schema::table('rent_infos', function (Blueprint $table) {
            $table->dropConstrainedForeignId('city_id');
            $table->dropConstrainedForeignId('area_id');
        });
        Schema::table('rent_infos', function (Blueprint $table) {
            $table->foreignIdFor(Area::class)->nullable()->constrained();
            $table->foreignIdFor(City::class)->nullable()->constrained();
        });

        foreach($datas as $data){
            RentInfo::find($data['id'])->update([
                'city_id' => $data['city_id'],
                'area_id' => $data['area_id']
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table((new RentInfo())->getTable(), function (Blueprint $table) {
            // $table->foreignId('city_id')->nullable(false)->change();
            // $table->foreignId('area_id')->nullable(false)->change();
        });
    }
}
