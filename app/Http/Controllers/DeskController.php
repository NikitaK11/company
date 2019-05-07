<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DeskController extends Controller
{
    public function index(Request $request){
        $data = $request->all();
        $query = Task::query();
        if (!empty($data['executor_id'])&&$data['executor_id']!=0){
            $query->where(['executor_id'=>$data['executor_id']]);
        }
        else{
            $data['executor_id'] = 0;
        }
        if (!empty($data['project_id'])&&$data['project_id']!=0){
            $query->where(['project_id'=>$data['project_id']]);
        }
        else{
            $data['project_id'] = 0;
        }
        $data['tasks'] = $query->get();
        $data['projects'] = Project::all();
        $data['statuses'] = Status::all();
        $data['users'] = User::all();

        return view('desk')->with($data);
    }

}
