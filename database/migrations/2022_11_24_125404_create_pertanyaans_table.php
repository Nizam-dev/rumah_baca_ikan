<?php

use App\Models\Pertanyaan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materi_id')->constrained();
            $table->string('soal');
            $table->string('jawaban');
            $table->timestamps();
            $table->string('deleted_at')->nullable();
        });

        Pertanyaan::create([
            'materi_id'=>1,
            'soal'=>'apakah bumi bulat ?',
            'jawaban'=>'tidak',
            
        ]);
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaans');
    }
}
