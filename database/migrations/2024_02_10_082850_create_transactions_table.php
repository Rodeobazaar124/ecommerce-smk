<?php

use App\Models\product;
use App\Models\receipt;
use App\Models\User;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(receipt::class)->nullable()->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(product::class)->constrained();
            $table->integer('amount')->default(1);
            $table->integer('total_price')->default(1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
