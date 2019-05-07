<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskPriority;
use App\Models\TaskStatus;
use App\Models\TaskType;
use App\Models\Telegram;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $data = $request->all();

        $query = Task::with(['type','status','priority','project','executor','creator']);

        if (empty($data['executor_id'])){
            $data['executor_id'] = 1;
        }
        else{
            $query->where(['executor_id'=>$data['executor_id']]);
        }

        if (empty($data['project_id'])){
            $data['project_id'] = 1;
        }
        else{
            $query->where(['project_id'=>$data['project_id']]);
        }



        $data['tasks'] = $query->get();


        $data['projects'] = Project::all();
        $data['users'] = User::all();


        return view('tasks')->with($data);
    }

    public function view(Request $request){


        $data = $request->all();
        $data['task'] =  Task::with(['type','status','priority','project','executor','creator'])
            ->where(['id'=>$data['id']])
            ->first();



        $data['projects'] = \App\Models\Project::all();
        $data['taskTypes'] = TaskType::all();
        $data['taskStatuses'] = TaskStatus::all();
        $data['taskPriorities'] = TaskPriority::all();
        $data['users'] = User::with(['userType'])->get();

        return view('task')->with($data);
    }

    public function complete(Request $request){
        $data = $request->all();
        $task = Task::query()->where(['id'=>$data['id']])->first();
        $message = 'Задание № '.$task->id . ' ' . $task->name . ' переведено из статуса '. $task->status->name . ' в статус ';
        if ($task->executor->id == Auth::id()){
            $task->task_status_id = $data['status_id'];
            $task->executor_id = $data['executor_id'];
            if($data['status_id'] == 5)
                $task->date_end = (new \DateTime('now'))->format('Y-w-d h:m:s');
            $task->save();
            $task->refresh();

            $message .= $task->status->name . ' пользователем ' . Auth::user()->name;

            Telegram::sendMessage($message);
        }

        return redirect('/task?id='.$task->id);
    }
}
