<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pertanyaan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'materi_id','soal','jawaban',
    ];

    protected $dates = ['deleted_at'];

    public function ganda()
    {
        return $this->hasMany(PilihanGanda::class);
    }
}
