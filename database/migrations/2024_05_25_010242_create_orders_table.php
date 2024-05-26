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
            $table->foreignId('user_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('payment_method')->default('Cash on Delivery')->nullable();
            // $table->text('image')->nullable();

            //updated_ when admin accep the order
          
            $table->text('proof_of_payment')->nullable();
            $table->String('rider_name')->nullable();
            $table->text('rider_phone_number')->nullable();
            $table->string('status')->default('prepairing');
            
            $table->timestamps();
            
            // pending, cancled, recieved
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
