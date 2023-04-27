<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funnels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('line_nr');
            $table->integer('account_id')->index();
            $table->integer('organization_id')->nullable()->index();
            $table->string('name');
            $table->string('question');
            $table->integer('qty');
            $table->float('min_value');
            $table->float('max_value');
            $table->integer('min_value_total')->storedAs('min_value * qty');
            $table->integer('max_value_total')->storedAs('max_value * qty');
            $table->boolean('to_calculate', 'false');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funnels');
    }
}
