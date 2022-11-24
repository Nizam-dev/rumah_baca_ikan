<?php

use App\Models\Jenjang;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateJenjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenjangs', function (Blueprint $table) {
            $table->id();
            $table->string('jenjang',15);
            $table->timestamps();
            $table->string('deleted_at')->nullable();
        });

        Jenjang::create([
            'jenjang'=>'TK',
            
        ]);

        Jenjang::create([
            'jenjang'=>'SD/MI',
            
        ]);
        Jenjang::create([
            'jenjang'=>'SMP/MTS',
            
        ]);
        Jenjang::create([
            'jenjang'=>'SMK/SMA/MA',
            
        ]);
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenjangs');
    }
}
