<?php

use App\Models\AppSetting;
use App\Models\Media;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new AppSetting())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->integer('ads_count')->default(2);
            $table->string('site_name')->nullable();
            $table->foreignId('logo_id')->nullable()->constrained((new Media())->getTable());
            $table->foreignId('favicon_id')->nullable()->constrained((new Media())->getTable());
            $table->string('site_title')->nullable();
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
        Schema::dropIfExists((new AppSetting())->getTable());
    }
}
