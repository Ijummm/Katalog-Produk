<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomentarFoto extends Model
{
    protected $table = 'komentarfoto';
    protected $primaryKey = 'komentarID';
    protected $fillable = [
        'fotoID',
        'userID',
        'isiKomentar',
        'tanggalKomentar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class, 'fotoID', 'fotoID');
    }
}
