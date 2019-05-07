<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data['user'] = \App\Models\User::query()->where(['id'=>Auth::id()]);
        $data['departments'] = Department::with(['users','chief'])->get();
        return view('departments')->with($data);
    }


}
