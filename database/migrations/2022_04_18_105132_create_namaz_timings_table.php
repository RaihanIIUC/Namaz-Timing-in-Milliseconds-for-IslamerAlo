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
        Schema::create('namaz_timings', function (Blueprint $table) {
            $table->id();
            $table->string('ফজর শুরু')->nullable();
            $table->string('ফজর শেষ')->nullable();
            $table->string('জোহর শুরু')->nullable();
            $table->string('জোহর শেষ')->nullable();
            $table->string('আসর শুরু')->nullable();
            $table->string('আসর শেষ')->nullable();
            $table->string('মাগরিব, ইফতার')->nullable();
            $table->string('মাগরিব শেষ')->nullable();
            $table->string('এশা শুরু')->nullable();
            $table->string('এশা শেষ')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('namaz_timings');
    }
};
