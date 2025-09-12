<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable();
        
        // Shipping
        $table->string('ship_name');
        $table->string('ship_phone');
        $table->string('ship_address1');
        $table->string('ship_address2')->nullable();
        $table->string('ship_city');
        $table->string('ship_state');
        $table->string('ship_postcode');
        $table->string('ship_country');

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

        // Order totals
        $table->decimal('subtotal', 10, 2)->default(0);
        $table->decimal('shipping_fee', 10, 2)->default(0);
        $table->decimal('discount', 10, 2)->default(0);
        $table->decimal('total', 10, 2)->default(0);

        // Payment
        $table->string('payment_method')->nullable();
        $table->string('payment_status')->default('pending');

        // Order Status
        $table->enum('status', [
            'pending','accepted','packed','shipped','delivered','cancelled'
        ])->default('pending');

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
