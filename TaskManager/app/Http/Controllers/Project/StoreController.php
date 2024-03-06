<?php

namespace App\Http\Controllers\Project;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreRequest;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){

        $data = $request->validated();
        $project = Project::create($data);

        return $project;
   

    }
     
}
