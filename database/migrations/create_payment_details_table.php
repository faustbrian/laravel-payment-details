<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Payment Details.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentDetailsTable extends Migration
{
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

    public function down()
    {
        Schema::dropIfExists('payment_details');
    }
}
