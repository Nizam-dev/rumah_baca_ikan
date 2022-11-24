<?php

use App\Models\Kelas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('kelas',2);
            $table->foreignId('jenjang_id')->constrained();
            $table->timestamps();
            $table->string('deleted_at')->nullable();
        });
        Kelas::create([
            'kelas'=>'0',
            'jenjang_id'=>1,
        ]);

        Kelas::create([
            'kelas'=>'1',
            'jenjang_id'=>2,
        ]);
        Kelas::create([
            'kelas'=>'2',
            'jenjang_id'=>2,
        ]);
        Kelas::create([
            'kelas'=>'3',
            'jenjang_id'=>2,
        ]);
        Kelas::create([
            'kelas'=>'4',
            'jenjang_id'=>2,
        ]);
        Kelas::create([
            'kelas'=>'5',
            'jenjang_id'=>2,
        ]);
        Kelas::create([
            'kelas'=>'6',
            'jenjang_id'=>2,
        ]);

        Kelas::create([
            'kelas'=>'1',
            'jenjang_id'=>3,
        ]);
        Kelas::create([
            'kelas'=>'2',
            'jenjang_id'=>3,
        ]);
        Kelas::create([
            'kelas'=>'3',
            'jenjang_id'=>3,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
