<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBuku extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_peminjam','judul_buku','alamat','no_hp','kategori','kode_referensi','lama_peminjaman','catatan','status_buku','tanggal_pengembalian'
    ];
}
