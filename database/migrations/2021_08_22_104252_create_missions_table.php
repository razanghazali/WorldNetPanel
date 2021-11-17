<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users', 'id')->nullOnDelete();
            $table->foreignId('day_id')->nullable()->constrained('day', 'id')->nullOnDelete();
            $table->string('name');
            $table->enum('mission_type',['معاينة','صيانة','تحصيل','زيارة دورية ','فحص','مشروع']);
            $table->dateTime('ReportingTime_date');
            $table->string('reporting_method');
            $table->time('checkOut_time');
            $table->string('chekOutLocation');
            $table->time('checkIn_time');
            $table->time('finish_time');
            $table->time('secCheckout_time');
            $table->string('chekOut_address');
            $table->enum('status',['منتهية','غير منتهية']);
            $table->integer('cost');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missions');
    }
}
