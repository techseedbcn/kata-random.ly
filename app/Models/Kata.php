<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kata extends Model
{
    use HasFactory;

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'kata_skill', 'kata_id', 'skill_id');
    }
}
