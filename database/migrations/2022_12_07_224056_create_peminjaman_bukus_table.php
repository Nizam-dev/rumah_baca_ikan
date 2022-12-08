<?php

use App\Models\PeminjamanBuku;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_bukus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('judul_buku');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('kategori');
            $table->string('kode_referensi');
            $table->string('lama_peminjaman');
            $table->string('catatan')->nullable();
            $table->timestamps();
        });

        PeminjamanBuku::create([
            'nama_peminjam'=>'asep',
            'judul_buku'=>'Langit Cerah',
            'alamat'=>'Banyuwnangi 648472 Indonesia RayA',
            'no_hp'=>'0813131313',
            'kategori'=>'Novel',
            'kode_referensi'=>'121',
            'lama_peminjaman'=>'3',
            'catatan'=>'buku bagus'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman_bukus');
    }
}
