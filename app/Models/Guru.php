<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use SoftDeletes;
    use HasFactory;
    // memanggil table
    protected $table = 'guru';
    protected $guarded = ['id'];

    //relasi one two many
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
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


}
