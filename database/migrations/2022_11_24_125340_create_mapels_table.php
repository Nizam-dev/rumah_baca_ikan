<?php

use App\Models\Mapel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapels', function (Blueprint $table) {
            $table->id();
            $table->string('mapel', 30);
            $table->foreignId('kelas_id')->constrained();
            $table->timestamps();
            $table->string('deleted_at')->nullable();
        });

        Mapel::create([
            'mapel' => 'Bahasa Indonesia',
            'kelas_id' => '1'
        ]);
        Mapel::create([
            'mapel' => 'Bahasa Inggris',
            'kelas_id' => '2'
        ]);
        Mapel::create([
            'mapel' => 'Matematika',
            'kelas_id' => '3'
        ]);
        Mapel::create([
            'mapel' => 'Matematika',
            'kelas_id' => '4'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapels');
    }
}
