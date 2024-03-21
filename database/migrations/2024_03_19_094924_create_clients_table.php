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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name_prefix'); // рассшифровка аббриветур
            $table->string('company_name');
            // представитель компании
            $table->string('delegate_name');
            $table->string('delegate_surname');
            $table->string('delegate_th_name')->nullable();
            $table->string('delegate_post');

            $table->string('phone');
            $table->string('bik');
            $table->string('inn');
            $table->string('kpp');
            $table->string('address');
            $table->string('payment_account');
            $table->string('correspondent_account'); // корсчет
            
            $table->foreignId('bank_id')->constrained('banks','id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
