<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'foto';
    protected $primaryKey = 'fotoID';

    protected $fillable = [
        'judulFoto',
        'deskripsiFoto',
        'tanggalUnggah',
        'lokasiFile',
        'userID'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function komentars()
    {
        return $this->hasMany(KomentarFoto::class, 'fotoID', 'fotoID');
    }
}
