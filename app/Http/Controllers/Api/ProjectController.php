<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with(['type','technologies'])->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show($slug) {

        $project = Project::where('slug', $slug)->with(['type', 'technologies'])->first();
        
        if($project){
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        }else{
            return response()->json([
                'message' => 'Project not found.',
            ], 400);
        }
        
    }
}
