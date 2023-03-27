<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Resources\V1\SkillCollection;
use App\Http\Resources\V1\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills= Skill::all();
        // 2ways
        // return new SkillCollection($skills);
        return SkillResource::collection($skills);
    }
    public function show(Skill $skill)
    {        
        return new SkillResource($skill);
    }
    public function store(StoreSkillRequest $req)
    {
        Skill::create($req->validated());
        return response()->json("skill created");
    }
    public function update(StoreSkillRequest $req, Skill $skill)
    {
        $skill->update($req->validated());
        return response()->json("skill updated");
    }
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json("skill deleted");
    }
}
