<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePaymentDetailsTable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class CreatePaymentDetailsTable extends Migration
{
    /**
     *
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->morphs('detailable');
            $table->string('provider');
            $table->string('identifier');
            $table->text('data');
            $table->char('checksum', 40);
        });
    }

    /**
     *
     */
    public function down()
    {
        Schema::dropIfExists('payment_details');
    }
}
