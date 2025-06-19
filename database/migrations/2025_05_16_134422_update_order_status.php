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
    Schema::table('orders', function (Blueprint $table) {
        if (Schema::hasColumn('orders', 'status')) {
            $table->dropColumn('status'); // حذف العمود
        }
    });

    Schema::table('orders', function (Blueprint $table) {
        $table->enum('status', ['pending', 'receiving', 'delivering', 'canceled', 'completed'])
              ->default('pending')
              ->after('products_data'); // إعادة إنشائه بالقيم الجديدة
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        if (Schema::hasColumn('orders', 'status')) {
            $table->dropColumn('status');
        }
    });

    Schema::table('orders', function (Blueprint $table) {
        $table->enum('status', ['pending', 'receiving', 'delivering', 'canceled'])
              ->default('pending')
              ->after('products_data');
    });
}

};
