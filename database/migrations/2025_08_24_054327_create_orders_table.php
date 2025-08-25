<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // Shipping
        $table->string('ship_name');
        $table->string('ship_phone');
        $table->string('ship_address1');
        $table->string('ship_address2')->nullable();
        $table->string('ship_city');
        $table->string('ship_state')->nullable();
        $table->string('ship_postcode')->nullable();
        $table->string('ship_country')->default('IN');

        // Billing
        $table->boolean('billing_same_as_shipping')->default(true);
        $table->string('bill_name')->nullable();
        $table->string('bill_phone')->nullable();
        $table->string('bill_address1')->nullable();
        $table->string('bill_address2')->nullable();
        $table->string('bill_city')->nullable();
        $table->string('bill_state')->nullable();
        $table->string('bill_postcode')->nullable();
        $table->string('bill_country')->nullable();

        // Totals
        $table->decimal('subtotal', 10, 2);
        $table->decimal('shipping_fee', 10, 2)->default(0);
        $table->decimal('discount', 10, 2)->default(0);
        $table->decimal('total', 10, 2);

        // Status
        $table->string('payment_method')->default('cod');    // cod|online
        $table->string('payment_status')->default('pending');// pending|paid|failed
        $table->string('status')->default('pending');        // pending|processing|completed|canceled

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
