<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('type')->nullable();
            $table->timestamps();
        });

        Schema::create('custom_fieldables', function (Blueprint $table) {
            $table->foreignId('custom_field_id')->nullable()->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('fieldable_id')->nullable();
            $table->string('fieldable_model');
            $table->string('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_fieldables');
        Schema::dropIfExists('custom_fields');
    }
}
