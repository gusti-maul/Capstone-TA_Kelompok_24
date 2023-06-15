<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tapel extends Model
{
    protected $table = 'tapel';
    protected $guarded = ['id'];
    use SoftDeletes;

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    public function kenaikankelas()
    {
        return $this->hasMany(KenaikanKelas::class);
    }
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}
