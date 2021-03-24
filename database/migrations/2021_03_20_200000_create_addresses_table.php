<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->set('alias', ['entrega', 'facturacion']);
            $table->string('address');
            $table->string('postcode');
            $table->string('city');
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('customer_id')->unsigned();
            $table->unsignedBigInteger('province_id')->unsigned();
            $table->unsignedBigInteger('country_id')->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
