<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Department;
use App\Models\Order;
use App\Models\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $data = $request->all();
        if (empty($data['id'])){
            $data['id'] = 1;
        }
        $data['department'] =  Department::with(['users'])->where(['id'=>$data['id']])->first();
        $data['users'] = \App\Models\User::query()->where(['department_id'=>$data['id']])->get();
        return view('users')->with($data);
    }

    public function user(Request $request){
        $data = $request->all();
        if (empty($data['id'])){
            $data['id'] = 1;
        }
        $data['user'] = \App\Models\User::with(['userType','department'])->where(['id'=>$data['id']])->first();
        return view('user')->with($data);
    }

    public function userCabinet(Request $request){
        $data = $request->all();
        $data['user'] = \App\Models\User::with(['userType','department'])
            ->where(['id'=>Auth::id()])
            ->first();

        $data['tasks'] =  Task::with(['type','status','priority','project','executor','creator'])
            ->where(['executor_id'=>$data['user']->id])
            ->get();

        return view('user-cabinet')->with($data);
    }

}
