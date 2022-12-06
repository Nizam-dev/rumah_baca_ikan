<?php

use App\Models\Poin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('poin');
            $table->foreignId('pertanyaan_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->timestamps();
        });
        // Poin::create([
        //     'poin'=>2,
        //     'user_id'=>2,
        //     'pertanyaan_id'=>1
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poins');
    }
}
