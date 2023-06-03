<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with(['type','technologies'])->orderBy('id','desc')->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show($slug) {

        if($slug == 'last'){
            $project = Project::orderBy('id','desc')->with(['type', 'technologies'])->first();
        } else {
            $project = Project::where('slug', $slug)->with(['type', 'technologies'])->first();
        }
        
        if($project){
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Project not found.',
            ], 404);
        }
        
    }
}
