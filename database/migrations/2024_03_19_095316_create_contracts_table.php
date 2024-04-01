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
        Schema::create('contracts', function (Blueprint $table) {
            // $table->id();
            $table->bigInteger('id');
            $table->bigInteger('year_id');
            $table->primary(['year_id', 'id']);
            $table->foreignId('client_id')->constrained();
            $table->foreignId('contract_type_id')->constrained();
            $table->json('content');
            $table->timestamps();
        });
        // DB::statement('CREATE SEQUENCE contracts_id_seq;');
        // DB::statement('ALTER TABLE contracts ALTER COLUMN id SET SERIAL PRIMARY KEY;'); 
        
        // autoincrement for id
        DB::statement("ALTER TABLE contracts ALTER COLUMN id SET DEFAULT nextval('contracts_id_seq');"); 
        DB::statement("ALTER TABLE contracts ALTER COLUMN year_id SET DEFAULT EXTRACT(YEAR FROM CURRENT_DATE);"); 
        

        /*
        {
    
            "year_id": 2024,
            "client_id": "f1",
        }
        
        
        */

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
