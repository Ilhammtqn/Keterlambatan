<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'rombel_id',
        'rayon_id',
    ];

    public function rombel(){
        return $this->belongsTo(Rombel::class, 'rombel_id', 'id');
    }

    public function rayon(){
        return $this->belongsTo(Rayon::class, 'rayon_id', 'id');
    }

    public function late() {
        return $this->hasMany(Late::class, 'student_id', 'id');
    }
}