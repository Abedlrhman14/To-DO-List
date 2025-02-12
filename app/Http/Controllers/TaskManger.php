<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class TaskManger extends Controller
{
    public function addTask()
    {
        return view('tasks.add');
    }
    public function addTaskPost(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'dateline'=>'required',
        ]);
        $task= new tasks();
        $task->title= $request->title;
        $task->description= $request->description;
        $task->dateline= $request->dateline;
        $task->user_id = auth()->user()->id;
         if($task->save())
         {
            return redirect(route('home'))
            ->with('Success',"Task added successfuly");
         }
         return redirect(route('task.add'))
         ->with('error','task not added');
    }

    public function listTask()
    {
       $tasks= Tasks::where('user_id',auth()->user()->id)->where('status',Null)->paginate(3);
       return view('welcome2',compact('tasks'));
    }

    public function update($id)
    {
       Tasks::where('user_id',auth()->user()->id)
       ->where('id',$id)->update(['status'=>"complated"]);
       return redirect(route('home'))->with('success','task updated');
    }

    public function deleteTask($id)
    {
       Tasks::where('user_id',auth()->user()->id)->where('id',$id)->delete();
       return redirect(route('home'))->with('success','task updated');
    }


}
