<?php

namespace App\Http\Controllers;

use App\EventType;
use App\Models\Department;
use App\Models\Event;
use App\Models\Feedback;
use App\Models\Mailer;
use App\Models\News;
use App\Models\Order;
use App\Models\PaymentTypes;
use App\Models\Place;
use App\Models\Status;
use App\Models\Task;
use App\Models\TaskPriority;
use App\Models\TaskStatus;
use App\Models\TaskType;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function stat(Request $request){
        $data = $request->all();


        $data['projects'] = \App\Models\Project::all();

        $data['users'] = User::all();

        $query = Task::query();

        if(!empty($data['executor_id'])){
            $query->where(['executor_id'=>$data['executor_id']]);
        }
        else{
            $data['executor_id'] = 0;
        }

        if(!empty($data['project_id'])){
            $query->where(['project_id'=>$data['project_id']]);
        }
        else{
            $data['project_id'] = 0;
        }

         $data['statuses'] = Status::all();

        $data['tasks'] = Task::all();

        foreach ($data['users'] as &$user){
            $q = clone $query;
            $user['stat'] = $q
                ->where(['executor_id'=>$user->id])
                ->groupBy('task_status_id')
                ->selectRaw('count(*) as count, task_status_id')
                ->get();
        }


        return view('admin.stat')->with($data);
    }



    public function users(){

        if( !Auth::user()->admin){
            return redirect('/');
        }

        $data['users'] = User::with(['userType'])->get();


        return view('admin.users')->with($data);
    }

    public function userAddView (){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data['userTypes'] = UserType::all();
        $data['departments'] = Department::all();
        return view('admin.user-add')->with($data);
    }

    public function userAdd(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->department_id = $data['department_id'];
        $user->user_type_id = $data['user_type_id'];
        $user->password = \Illuminate\Support\Facades\Hash::make($data['password']);
        $user->save();

        return redirect(route('admin-users'));
    }

    public function user(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $data['user'] = User::with(['userType','department'])

            ->where(['id'=>$data['id']])
            ->first();

        return view('admin.user')->with($data);
    }

    public function userEditView (Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $data['userTypes'] = UserType::all();
        $data['departments'] = Department::all();
        $data['user'] = User::query()->where(['id'=>$data['id']])->first();
        return view('admin.user-edit')->with($data);
    }

    public function userEdit(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();



        $user = User::query()->where(['id'=>$data['id']])->first();
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->user_type_id = $data['user_type_id'];
        $user->department_id = $data['department_id'];


        if( $user->save()){
            $file = $request->file('img');
            if($file){
                $user->img = $user->name.time();
                $destinationPath = 'images/users';
                $file->move($destinationPath,$user->img);
                $user->save();
            }

        }

        return redirect('/admin/user?id='.$user->id);

    }


    public function departments(){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data['departments'] = Department::all();
        return view('admin.departments')->with($data);
    }

    public function department(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $data['department'] = Department::with(['users'])
            ->where(['departments.id'=>$data['id']])
            ->first();
        return view('admin.department')->with($data);
    }

    public function departmentEdit(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $data['users'] = User::with('userType')->get();
        $data['department'] = Department::query()->where(['id'=>$data['id']])->first();
        return view('admin.department-edit')->with($data);
    }

    public function departmentUpdate(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();


        $p = Department::query()->where(['id'=>$data['department_id']])->first();
        $p->name = $data['name'];
        $p->phone = $data['phone'];
        $p->address = $data['address'];
        $p->description = $data['description'];
        $p->chief_id = $data['chief_id'];

         $arr = User::query()->where(['department_id'=> $p->id])->get();


         foreach ($arr as $a){
             $a->department_id = null;
             $a->save();
         }

        $usersId = json_decode($data['users']);

        $users = User::query()->whereIn('id',$usersId)->get();

        foreach ($users as $user){
            $user->department_id = $p->id;
            $user->save();
        }

        $p->save();

        return redirect('/admin/department?id='.$p->id);
    }

    public function departmentCreateView(){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data['users'] = User::with(['userType'])->get();
        return view('admin.department-create')->with($data);
    }

    public function departmentCreate(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $department = new Department();
        $department->name = $data['name'];
        $department->phone = $data['phone'];
        $department->address = $data['address'];
        $department->description = $data['description'];
        $department->chief_id = $data['chief_id'];
        $department->save();
        return redirect('/admin/department?id='.$department->id);
    }

    public function projects(){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data['projects'] = \App\Models\Project::all();

        return view('admin.projects')->with($data);
    }

    public function project(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $data['project'] = \App\Models\Project::query()->where(['id'=>$data['id']])->first();
        return view('admin.project')->with($data);
    }

    public function projectEdit(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $data['project'] = \App\Models\Project::query()->where(['id'=>$data['id']])->first();
        return view('admin.projectEdit')->with($data);
    }

    public function projectUpdate(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $project = \App\Models\Project::query()->where(['id'=>$data['id']])->first();
        $data['project'] = $project;

        $project->name = $data['name'];

        if($project->save()){
            $file = $request->file('img');
            if($file){
                $project->img = $project->name.time();
                $destinationPath = 'images/projects';
                $file->move($destinationPath,$project->img);
                $project->save();
            }

        }


        return view('admin.projectEdit')->with($data);
    }

    public function projectCreate(){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        return view('admin.project-create');
    }

    public function projectAdd(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $project = new \App\Models\Project();

        $project->name = $data['name'];

        if($project->save()){
            $file = $request->file('img');
            if($file){
                $project->img = $project->name.time();
                $destinationPath = 'images/projects';
                $file->move($destinationPath,$project->img);
                $project->save();
            }

        }
        return redirect('/admin/project?id='.$project->id);
    }

    public function tasks(Request $request)
    {
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $query = Task::with(['type', 'status', 'priority', 'project', 'executor', 'creator']);
        $data['projects'] = \App\Models\Project::all();
        $data['users'] = User::all();
        $data['statuses'] = TaskStatus::all();


        if (empty($data['status_id'])) {
            $data['status_id'] = 0;
        }
        else{
            $query->where(['task_status_id'=>$data['status_id']]);
        }

        if (empty($data['executor_id'])) {
            $data['executor_id'] = 0;
        }
        else{
            $query->where(['executor_id'=>$data['executor_id']]);
        }

        if (empty($data['project_id'])) {
            $data['project_id'] = 0;
        }
        else{
            $query->where(['project_id'=>$data['project_id']]);
        }

        $data['tasks'] = $query->get();

        return view('admin.tasks')->with($data);
    }

    public function task(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $data['task'] =  Task::with(['type','status','priority','project','executor','creator'])
            ->where(['id'=>$data['id']])
            ->first();

        $data['projects'] = \App\Models\Project::all();
        $data['taskTypes'] = TaskType::all();
        $data['taskStatuses'] = TaskStatus::all();
        $data['taskPriorities'] = TaskPriority::all();
        $data['users'] = User::with(['userType'])->get();

        return view('admin.task')->with($data);
    }

    public function taskEdit(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $data['task'] =  Task::with(['type','status','priority','project','executor','creator'])
            ->where(['id'=>$data['id']])
            ->first();

        $data['projects'] = \App\Models\Project::all();
        $data['taskTypes'] = TaskType::all();
        $data['taskStatuses'] = TaskStatus::all();
        $data['taskPriorities'] = TaskPriority::all();
        $data['users'] = User::with(['userType'])->get();

        return view('admin.task-edit')->with($data);
    }

    public function taskUpdate(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();
        $task = Task::query()->where(['id'=>$data['id']])->first();

        $task->name = $data['name'];
        $task->project_id = $data['project_id'];
        $task->creator_id = $data['creator_id'];
        $task->executor_id = $data['executor_id'];
        $task->task_type_id = $data['type_id'];
        $task->task_status_id = $data['status_id'];
        $task->priority_id = $data['priority_id'];
        $task->point = $data['point'];
        $task->branch = $data['branch'];
        $task->date_begin = $data['date_begin'];
        $task->created_at = $data['created_at'];
        $task->description = $data['description'];

        $task->save();


        return redirect('/admin/task?id='.$task->id);
    }

    public function taskCreate(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();

        $data['projects'] = \App\Models\Project::all();
        $data['taskTypes'] = TaskType::all();
        $data['taskStatuses'] = TaskStatus::all();
        $data['taskPriorities'] = TaskPriority::all();
        $data['users'] = User::with(['userType'])->get();

        return view('admin.task-create')->with($data);
    }

    public function taskAdd(Request $request){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        $data = $request->all();

        $task = new Task();
        $task->name = $data['name'];
        $task->project_id = $data['project_id'];
        $task->creator_id = $data['creator_id'];
        $task->executor_id = $data['executor_id'];
        $task->task_type_id = $data['type_id'];
        $task->task_status_id = $data['status_id'];
        $task->priority_id = $data['priority_id'];
        $task->point = $data['point'];
        $task->branch = $data['branch'];
        $task->date_begin = $data['date_begin'];
        $task->created_at = $data['created_at'];
        $task->description = $data['description'];
        $task->save();


        return redirect('/admin/task?id='.$task->id);
    }


















    public function index(){
        if( !Auth::user()->admin){
            return redirect('/');
        }
        return view('admin.index');
    }




    public function feedback(){
        $feedbacks = Feedback::with(['user'])->get();
        return view('admin.feedback')->with(['feedbacks'=>$feedbacks]);
    }

    public function feedbackAnswer($id){
        $feedback = Feedback::with(['user'])
            ->where(['feedback.id'=>$id])->get();
        return view('admin.feedbackAnswer')->with(['feedback'=>$feedback[0]]);
    }

    public function feedbackSend(Request $request){
        $params = $request->query();
        $feedback = Feedback::query()->find($params['id']);
        $feedback->answer = $params['message'];
        $feedback->save();
        Mailer::feedback($feedback);
        return redirect(route('admin-feedback'));
    }

    public function newsAdd(){
        return view('admin.newsAdd');
    }

    public function newsCreate(Request $request){
        $file = $request->file('img');
        $params = $request->post();

        $news = new News();

        if($news){
            $news->name = $params['name'];
            $news->description = $params['description'];

            if($news->save()){
                $file = $request->file('img');
                if($file){
                    $news->img = $news->name.time();
                    $destinationPath = 'images/news';
                    $file->move($destinationPath,$news->img);
                    $news->save();
                }
                return redirect(route('news'));
            }
        }
    }

    public function send($id){
        $users = User::all();
        $news = News::query()->find($id);
        foreach ($users as $user){
            Mailer::news($news,$user);
        }
        return view('admin.info')->with(['msg'=>'Рассылка умешно выполнена','count'=>count($users)]);
    }


}
