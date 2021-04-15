<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('company')->nullable();
            $table->string('cif')->nullable();
            $table->string('vat_number')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
