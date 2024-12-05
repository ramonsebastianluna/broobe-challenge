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
        Schema::create('metric_history_runs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('strategy_id')->constrained('strategies')->onDelete('cascade');
            $table->text('url');
            $table->boolean('accesibility_metric');
            $table->boolean('pwa_metric');
            $table->boolean('performance_metric');
            $table->boolean('seo_metric');
            $table->boolean('best_practices_metric');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metric_history_runs');
    }
};
