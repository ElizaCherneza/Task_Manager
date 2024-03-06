<?php

namespace App\Http\Controllers\Project;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DeleteController extends Controller
{
    public function __invoke(Project $project){

        $idProject = Project::find($project->id);
        $idProject->delete();
    
        return response()->json(['message' => 'Задача успешно удалена'], 200);


    }
     
}
