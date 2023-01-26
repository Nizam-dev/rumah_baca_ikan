<?php

use App\Models\NamaGame;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamaGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nama_games', function (Blueprint $table) {
            $table->id();
            $table->string('nama_game');
            $table->timestamps();
            $table->string('deleted_at')->nullable();
        });

        NamaGame::create([
            'nama_game'=>'Tebak Buah'
        ]);
        
        NamaGame::create([
            'nama_game'=>'Tumbuhan'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nama_games');
    }
}
