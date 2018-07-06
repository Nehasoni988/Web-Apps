<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\CreateTaskRequest;
use App\HttpResponse;
use Carbon\Carbon;


class taskController extends Controller
{
    public function welcome1()
    {
        return view('todoTask.welcome');
    }
    public function welcome() 
    {
        $top = 'Tasks';
        $message = 'No Task';
        $task = Task::get();
        return view('todoTask.homepage',compact('task','message','top'));
    }
    public function form()
    {
        return view('todoTask.taskForm');
    }
    public function show()
    { 
        $top = 'Tasks';
        $message = 'No Task';
        $task = Task::get(); 
        return view('todoTask.homepage',compact('task','message','top'));
    }
    public function store(CreateTaskRequest $request)
    {
       Task::create($request->all());
       session()->flash('flash_message','!! Task Created Successfully !!');      //creating a request & save the fetched detail into database
       return redirect('todohome');
    }
    public function delete($id)
    {
      Task::findOrFail($id)->delete();
      session()->flash('flash_message1','!! Deleted Successfully !!');
      return redirect('todohome');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('todoTask.formedit',compact('task'));
    }
    public function update(CreateTaskRequest $request,$id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());  
        return redirect('show'); 
    }
    public function search()
    {
        $message = 'Search-Result Not Found';
        $top = 'Search-Result';
        $title = Input::get('search');
        $task = DB::table('tasks')->where('title','like','%' .$title. '%')->get();
        return view('todoTask.homepage',compact('task','message','top'));
    }
    public function new()
    {
        $message = 'No Task For future';
        $top = 'Future-Task';
        $task = Task::latest('deadline')->where('deadline','>',Carbon::now()->toDateString())->get();
        return view('todoTask.homepage',compact('task','message','top'));
    }
    public function old()
    {
        $message = 'No Task is Pending';
        $top = 'Pending-Task';
        $task = Task::latest('deadline')->where('deadline','<',Carbon::now()->toDateString())->get();
        return view('todoTask.homepage',compact('task','message','top'));

    }
    public function recent()
    {
        $message = 'No Task For today';
        $top = 'Current-Task';
        $task = Task::latest('deadline')->where('deadline','=',Carbon::now()->toDateString())->get();
        return view('todoTask.homepage',compact('task','message','top'));

    }
    public function full($id)
    {
      $message = 'No Data';
      $top = 'Detailed Description';
      $task =Task::findOrFail($id);
      $task = Array($task);
      return view('todoTask.full',compact('task','top'));
    }
    public function bytitle()
    {
        $top = 'Tasks';
        $task = Task::orderBy('title')->get();
        return view('todoTask.homepage',compact('top','task'));
    }
    public function bydate()
    {
        $top = 'Tasks';
        $task = Task::orderBy('created_at')->get();
        return view('todoTask.homepage',compact('top','task'));
    }
    public function help()
    {
        return view('todoTask.help');
    }
    public function grid()
    {
        $top = 'Tasks';
        $message = 'No Task';
        $task = Task::get();
        return view('todoTask.grid',compact('task','message'));
    }
    public function clear()
    {

        DB::table('tasks')->delete();
        session()->flash('flash_message2','!! All Data Deleted Successfully !!');
        return redirect('todohome');
    }
}
