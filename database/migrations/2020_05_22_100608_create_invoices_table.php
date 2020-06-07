<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('tax')->nullable();
            $table->string('discount')->nullable();
            $table->string('total')->nullable();
            $table->string('paid')->nullable();
            $table->string('due')->nullable();
            $table->string('date')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('user_id')->nullable();
            $table->string('delete_status')->default(1);
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
        Schema::dropIfExists('invoices');
    }
}
