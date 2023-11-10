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
        Schema::create('usersimple', function (Blueprint $table) {
            $table->id('idUser');
            $table->string('name');
            $table->string('password');
            $table->string('nom_complet');
            $table->string('telephone');
            $table->string('email');
            // Add other columns as needed
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usersimple');
    }
};
