<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $guarded = ['id'];

    public function mapel()
    {
        return $this->belongsToMany(mapel::class)->withPivot(['nilai_pengetahuan', 'nilai_keterampilan'])->withTimestamps();
    }

    public function getAvatar()
    {
        if(!$this->avatar) {
            return asset('images/default.jpg');
        }
        return asset('images/' . $this->avatar);
    }
}
