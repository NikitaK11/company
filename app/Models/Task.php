<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    public function project(){
        return $this->hasOne(Project::class,'id','project_id');
    }

    public function type(){
        return $this->hasOne(TaskType::class,'id','task_type_id');
    }

    public function priority(){
        return $this->hasOne(TaskPriority::class,'id','priority_id');
    }

    public function status(){
        return $this->hasOne(TaskStatus::class,'id','task_status_id');
    }

    public function creator(){
        return $this->hasOne(User::class,'id','creator_id');
    }

    public function executor(){
        return $this->hasOne(User::class,'id','executor_id');
    }



    public function complete($data){
            $task = Task::query()->where(['id' => $data['id']])->first();
            if ($task->executor->id == Auth::id()) {
                $task->task_status_id = $data['status_id'];
                if ($task->task_status_id == 4) {
                    $qa = User::query()->where(['user_type_id' => 5])->first();
                    $task->executor_id = $qa->id;
                } else {
                    $user = User::with(['department'])->where(['id' => $task->executor->id])->first();
                    $task->executor_id = $user->department->chief_id;
                }
                return $task->save();
            }
        }

        public function get($data){
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

           return $query->get();
        }

        public function getFull($id){
            return    self::with(['type','status','priority','project','executor','creator'])
                ->where(['id'=>$id])
                ->first();
        }




}
