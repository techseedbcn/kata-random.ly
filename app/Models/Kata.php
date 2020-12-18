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

    public static function randomly($level, $skill)
    {
        $skill = Skill::find($skill);

        if($level == 'any' && is_null($skill))
        {
            return self::all()->random();
        }
        if($level == 'any')
        {
            return $skill->katas->random();
        }
        if(in_null($skill))
        {
            return self::where('level', $level)->random();
        }
        return $skill->katas->where('skill', $skill)->random();
    }
}
