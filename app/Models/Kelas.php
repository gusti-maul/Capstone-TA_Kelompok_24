<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'kelas';
    protected $guarded = ['id'];

    //relasi one two many
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

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
        return $this->hasMany(JadwalUjian::class, 'kelas_id', 'id');
    }

    
}
