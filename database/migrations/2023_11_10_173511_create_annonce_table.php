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
        Schema::create('annonce', function (Blueprint $table) {
            $table->id('idAnnonce');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('idUser')->on('usersimple')->onDelete('cascade');
            $table->string('titre');
            $table->text('description');
            $table->decimal('prix', 8, 2);
            $table->string('categorie');
            $table->date('date_publication');
            // Add other columns as needed
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonce');
    }
};
