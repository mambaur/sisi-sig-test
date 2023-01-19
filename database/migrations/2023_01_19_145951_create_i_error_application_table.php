<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_error_application', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('modules', 100)->nullable();
            $table->string('controller', 200)->nullable();
            $table->string('function', 200)->nullable();
            $table->string('error_line', 30)->nullable();
            $table->string('error_message', 1000)->nullable();
            $table->string('status', 30)->nullable();
            $table->string('param', 300)->nullable();
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
        Schema::dropIfExists('i_error_application');
    }
};
