<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;

class DeskController extends Controller
{
    public function index(Request $request){
        $data = $request->all();
        $data['tasks'] = Task::all();
        $data['projects'] = Project::all();
        $data['statuses'] = Status::all();
        return view('desk')->with($data);
    }

}
