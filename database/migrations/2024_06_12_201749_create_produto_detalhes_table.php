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
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento', 8, 2);
            $table->float('largura', 8, 2);
            $table->float('altura', 8, 2);
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id');

            Schema::table('produto_detalhes', function(Blueprint $table){
                $table->unsignedBigInteger('comprimento_id');
                $table->foreign('comprimento_id')->references('id')->on('produto_detalhes');
            });

            Schema::table('produto_detalhes', function(Blueprint $table){
                $table->unsignedBigInteger('largura_id');
                $table->foreign('largura_id')->references('id')->on('produto_detalhes');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_detalhes');
    }
};
