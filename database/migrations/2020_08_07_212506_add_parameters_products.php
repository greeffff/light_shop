<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParametersProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products',function (Blueprint $table){
            $table->json('parameters')->nullable();
            $table->string('stock')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products',function (Blueprint $table){
            $table->dropColumn('parameters');
            $table->dropColumn('stock');
        });
    }
}
