<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCcavenuePaidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('orderccavenuepaids', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('order_id', 20);
            $table->string('tracking_id', 20)->nullable();
            $table->string('bank_ref_no', 20)->nullable();
            $table->string('order_status', 20)->nullable();
            $table->string('failure_message', 400)->nullable();
            $table->string('payment_mode', 40)->nullable();
            $table->string('card_name', 40)->nullable();
            $table->integer('status_code', false, true)->length(5)->nullable();
            $table->string('status_message', 200)->nullable();
            $table->string('currency', 5)->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->string('billing_name', 60)->nullable();
            $table->string('billing_address', 150)->nullable();
            $table->string('billing_city', 30)->nullable();
            $table->string('billing_state', 30)->nullable();
            $table->string('billing_zip', 15)->nullable();
            $table->string('billing_country', 50)->nullable();
            $table->bigInteger('billing_tel', false, true)->length(22)->nullable();
            $table->string('billing_email', 70)->nullable();
            $table->string('delivery_name', 60)->nullable();
            $table->string('delivery_address', 150)->nullable();
            $table->string('delivery_city', 30)->nullable();
            $table->string('delivery_state', 30)->nullable();
            $table->string('delivery_zip', 15)->nullable();
            $table->string('delivery_country', 50)->nullable();
            $table->bigInteger('delivery_tel', false, true)->length(22)->nullable();
            $table->string('merchant_param1', 100)->nullable();
            $table->string('merchant_param2', 100)->nullable();
            $table->string('merchant_param3', 100)->nullable();
            $table->string('merchant_param4', 100)->nullable();
            $table->string('merchant_param5', 100)->nullable();
            $table->string('vault', 5)->nullable();
            $table->string('offer_type', 10)->nullable();
            $table->string('offer_code', 30)->nullable();
            $table->decimal('discount_value', 10, 2)->nullable();
            $table->string('retry', 5)->nullable();
            $table->integer('response_code', false, true)->length(5)->nullable();
            $table->decimal('mer_amount', 10, 2)->nullable();
            $table->string('sub_account_id', 20)->nullable();
            $table->integer('eci_value', false, true)->length(2)->nullable();
            $table->string('si_created', 5)->nullable();
            $table->string('si_ref_no', 15)->nullable();
            $table->string('si_status', 10)->nullable();
            $table->string('bene_account', 35)->nullable();
            $table->string('bene_name', 20)->nullable();
            $table->string('bene_ifsc', 20)->nullable();
            $table->string('bene_bank', 50)->nullable();
            $table->string('bene_branch', 260)->nullable();
            $table->string('inv_mer_reference_no', 100)->nullable();
            $table->timestamp('trans_date')->nullable();
            $table->decimal('trans_fee', 10, 2)->nullable();
            $table->decimal('service_tax', 10, 2)->nullable();
            $table->string('bin_country', 260)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderccavenuepaids');
    }
}
