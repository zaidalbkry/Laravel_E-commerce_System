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
            if (!Schema::hasColumn('orders', 'phone_number')) {
                $table->string('phone_number')->after('user_id');
            }
            if (!Schema::hasColumn('orders', 'products_data')) {
                $table->json('products_data')->after('total_price');
            }
        });
    }

    /**
     * Reverse the migrations.
     * Removes only the newly added columns instead of dropping the entire table.
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'phone_number')) {
                $table->dropColumn('phone_number');
            }
            if (Schema::hasColumn('orders', 'products_data')) {
                $table->dropColumn('products_data');
            }
        });
    }
};
