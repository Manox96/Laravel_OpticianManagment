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

        Schema::create('Details_factures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("facture_id");
            $table->foreign("facture_id")->references("id")->on("factures")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("produit_id");
            $table->foreign("produit_id")->references("id")->on("produits")->onDelete('cascade')->onUpdate('cascade');
            $table->integer("quantite");
            $table->float("prix_unitaire");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_factures');
    }
};
