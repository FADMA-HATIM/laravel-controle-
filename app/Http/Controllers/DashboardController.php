<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
 public function index(){
    $project=Project::count();
    $task=Task::count();
    $user=User::count();
    return view('backend.index' , compact('project','task','user'));
 }
}
