<?php

use App\Models\Materi;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->string('bab',3);
            $table->string('judul',30);
            $table->string('link_youtube');
            $table->timestamps();
            $table->string('deleted_at')->nullable();
        });

        Materi::create([
            'bab'=>'1',
            'judul'=>'Penjumlahan',
            'link_youtube'=>'https://www.youtube.com/watch?v=bdx64w2lG_Ys'

        ]);
        Materi::create([
            'bab'=>'1',
            'judul'=>'Belajar Membaca',
            'link_youtube'=>'https://www.youtube.com/watch?v=7XkqlPg9NQQ'

        ]);

        Materi::create([
            'bab'=>'2',
            'judul'=>'Pengurangan',
            'link_youtube'=>'https://www.youtube.com/watch?v=IMe0c7Uzwes'

        ]);

        Materi::create([
            'bab'=>'1',
            'judul'=>'Cerita',
            'link_youtube'=>'https://www.youtube.com/watch?v=7XkqlPg9NQQ'

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materis');
    }
}