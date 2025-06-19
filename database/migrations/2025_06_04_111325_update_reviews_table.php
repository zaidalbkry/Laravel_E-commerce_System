<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::table('reviews', function (Blueprint $table) {
                $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ✅ ارتباط بالمستخدم
        $table->foreignId('product_id')->constrained()->onDelete('cascade'); // ✅ ارتباط بالمنتج
        $table->integer('rating')->default(1); // ✅ تقييم من 1 إلى 5 نجوم
        $table->text('comment')->nullable(); // ✅ تعليق المراجعة
        
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            //
        });
    }
};
