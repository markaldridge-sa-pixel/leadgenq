<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leadforms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('account_id')->index();
            $table->integer('organization_id')->nullable()->index();
            $table->integer('funnel_id');
            $table->string('funnel_name');
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
        Schema::dropIfExists('leadforms');
    }
}
