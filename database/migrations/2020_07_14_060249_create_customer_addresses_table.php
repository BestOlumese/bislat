<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->text('billing_first_name')->nullable();
            $table->text('billing_last_name')->nullable();
            $table->text('billing_country')->nullable();
            $table->text('billing_address_1')->nullable();
            $table->text('billing_address_2')->nullable();
            $table->text('billing_state')->nullable();
            $table->text('billing_city')->nullable();
            $table->text('billing_postcode')->nullable();
            $table->text('shipping_first_name')->nullable();
            $table->text('shipping_last_name')->nullable();
            $table->text('shipping_country')->nullable();
            $table->text('shipping_address_1')->nullable();
            $table->text('shipping_address_2')->nullable();
            $table->text('shipping_state')->nullable();
            $table->text('shipping_city')->nullable();
            $table->text('shipping_postcode')->nullable();
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
        Schema::dropIfExists('customer_addresses');
    }
}
