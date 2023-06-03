<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('stockroom');
            $table->date('start');
            $table->date('end');
            $table->string('used_access');
            $table->string('doc_req')->nullable();
            $table->string('remarks')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('with_inventory')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
