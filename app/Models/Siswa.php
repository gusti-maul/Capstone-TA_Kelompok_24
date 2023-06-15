<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes;
    protected $table = 'siswa';
    protected $guarded = ['id'];
    // protected $attributes = ['avatar' => 'default.jpg',];

    public function mapel()
    {
        return $this->belongsToMany(mapel::class)->withPivot(['nilai_pengetahuan', 'nilai_keterampilan'])->withTimestamps();
    }
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }
        return asset('images/' . $this->avatar);
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['avatar' => 'default.jpg']);
    }

    public function kenaikankelas()
    {
        return $this->hasOne(KenaikanKelas::class, 'siswa_id');
    }
    
    public function nilai()
    {
        return $this->belongsToMany(Mapel::class, 'nilai', 'siswa_id', 'mapel_id')
            ->withPivot('nilai_pengetahuan', 'nilai_keterampilan')
            ->withTimestamps();
    }
}
