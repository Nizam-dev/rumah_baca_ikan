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
            $table->timestamps();
            $table->string('deleted_at')->nullable();
        });

        Mapel::create([
            'mapel' => 'Bahasa Indonesia'
        ]);
        Mapel::create([
            'mapel' => 'Bahasa Inggris'
        ]);
        Mapel::create([
            'mapel' => 'Matematika'
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
