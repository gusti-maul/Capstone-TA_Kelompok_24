<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapel extends Model
{
    use SoftDeletes;
    protected $table = 'mapel';
    protected $guarded = ['id'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function tapel()
    {
        return $this->belongsTo(Tapel::class, 'tapel_id');
    }
    public function jadwalujian()
    {
        return $this->hasOne(JadwalUjian::class, 'mapel_id', 'id');
    }
    
}