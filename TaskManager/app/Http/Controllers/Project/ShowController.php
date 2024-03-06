<?php

namespace App\Http\Controllers\Project;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ShowController extends Controller
{
    public function __invoke(Project $project){
        
        return $project;

    }
     
}
