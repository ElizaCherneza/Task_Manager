<?php

namespace App\Http\Controllers\Project;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    public function __invoke(){

        $projects = Project::all();
        return $projects;

    }
     
}
