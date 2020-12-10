<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public function katas()
    {
        return $this->belongsToMany(Kata::class, 'kata_skill', 'skill_id', 'kata_id');
    }
}
