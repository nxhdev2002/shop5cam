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
        Schema::dropIfExists('web_configs');
        Schema::create('web_configs', function (Blueprint $table) {
            $table->id();
            $table->decimal('upgrade_fee', 18, 8);
            $table->decimal('order_fixed_fee', 18, 8)->default(0.0);
            $table->float('order_percent_fee', 18, 8)->default(5);
            $table->decimal('ads_fee')->default(10000.0);
            $table->integer('notification_display_time')->default(3);
            $table->integer('guarantee_time')->default(7);
            $table->string('cloudinary_upload_api')->default(base64_decode('eyJjbG91ZCI6eyJjbG91ZF9uYW1lIjoiZGhjZXZ2eW1yIiwiYXBpX2tleSI6IjU0MzQ4Mjk5NzM2ODIxNCIsImFwaV9zZWNyZXQiOiIyVGhFOW9RN09TTnE1cTZtVlRJNEFqcGx3b2cifX0='));
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
