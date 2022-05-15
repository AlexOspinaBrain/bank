<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRelationsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cuentapropias', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users');
        });

        Schema::table('cuentaterceros', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users');
        });

        Schema::table('transaccions', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('cuentapropias_sale_id')->references('id')->on('cuentapropias');
            $table->foreignId('cuentapropias_entra_id')->nullable()->references('id')->on('cuentapropias');
            $table->foreignId('cuentaterceros_entra_id')->nullable()->references('id')->on('cuentaterceros');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaccions', function (Blueprint $table) {
            $table->dropColumn('cuentapropias_sale_id');
            $table->dropColumn('cuentapropias_entra_id');
            $table->dropColumn('cuentaterceros_entra_id');
            $table->dropColumn('user_id');
        });

        Schema::table('cuentaterceros', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('cuentapropias', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
