<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill as Skill;
use App\Http\Resources\Skill as SkillResource;

class SkillController extends Controller
{
    public function getSkills()
    {
        $skills = Skill::all();
       
        return SkillResource::collection($skills);
    }
}
