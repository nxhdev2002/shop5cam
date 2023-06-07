<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_configs', function (Blueprint $table) {
            $table->id();
            $table->decimal('upgrade_fee', 18, 8);
            $table->decimal('order_fixed_fee', 18, 8)->default(0.0);
            $table->float('order_percent_fee', 18, 8)->default(5);
            $table->integer('notification_display_time')->default(3);
            $table->integer('guarantee_time')->default(7);
            $table->string('cloudinary_upload_api')->nullable();
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
        Schema::dropIfExists('web_configs');
    }
}
