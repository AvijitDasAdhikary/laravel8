<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $records1 = ['record1'];
        $records2 = [];
        $value = 4;

        $users = [
            ['id'=>1, 'code'=>'DEVELOPER', 'age'=> 25],
            ['id'=>2, 'code'=>'HR', 'age'=> 52],
            ['id'=>3, 'code'=>'Accounts', 'age'=> 62],
            ['id'=>4, 'code'=>'Manager', 'age'=> 46],
        ];

        $admins = [
            ['name'=>'ADMIN', 'status'=> 'Active'],
        ];
        
        return view('dashboard',compact('records1','records2','value','users','admins'));
    }

    public function task(){
        $tasks = ['task1','task2','task3'];
        $tasks2 = ['list1','list2','list3'];

        return view('task', compact('tasks','tasks2'));
    }
}
