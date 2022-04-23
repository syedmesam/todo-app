<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
   
    function create()
    {
        return view('todo.create');
    }

    function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'datetime' => 'required|date'
        ]);
        
        $d = $request->datetime;
        $split = explode(' ',$d);
        $myDate = $split[0];
        $mytime = $split[1].' '.$split[2];
        $date = Carbon::createFromFormat('m/d/Y', $myDate)->format('Y-m-d');
        $new_time = Carbon::createFromFormat('h:i A', $mytime);
        
        $time = $new_time->format('H:i');
        
        $combineDateTime =  $date. ' ' . $time;
        
        $carbon = Carbon::createFromFormat('Y-m-d H:i',$combineDateTime);
        
        $finalDateTime = $carbon->timestamp . $carbon->milli;
        $trim = substr($finalDateTime, 0, -3);
        $finalDateTime = $trim . '54987';
        // dd($finalDateTime);
        
        $ToDo = new Todo();
        $todoTitle = $request->title;
        $todoDeadLine = $finalDateTime;
        $ToDo->create([
            'title' => $todoTitle,
            'dead_line' => $todoDeadLine,
            'status' => 'Pending',
        ]);
        $todo_lists = $ToDo->all();

        return redirect()->route('home');

        

    }
     public function edit($id)
    {

        $todo = Todo::find($id);
        return view('todo.edit',compact('todo'));

        // return view('todo.edit')->with(['id' => '$id']);


        // return $id;
    }

    public function update(Request $request,Todo $todo)
    {
        $ToDo = $todo->find($request->todo);
        //  dd($request->all());
        if($request->datetime !== null){
        $d = $request->datetime;
        $split = explode(' ',$d);
        $myDate = $split[0];
        $mytime = $split[1].' '.$split[2];
        $date = Carbon::createFromFormat('m/d/Y', $myDate)->format('Y-m-d');
        $new_time = Carbon::createFromFormat('h:i A', $mytime);
        
        $time = $new_time->format('H:i');
        
        $combineDateTime =  $date. ' ' . $time;
        
        $carbon = Carbon::createFromFormat('Y-m-d H:i',$combineDateTime);
        
        $finalDateTime = $carbon->timestamp . $carbon->milli;
        $trim = substr($finalDateTime, 0, -3);
        $finalDateTime = $trim . '54987';
        
        }else{
            $finalDateTime = $ToDo->dead_line;
        }

        
        $todoTitle = $request->title;
        $todoDeadLine = $finalDateTime;
        $ToDo->update([
            'title' => $todoTitle,
            'dead_line' => $todoDeadLine,
            'status' => $request->status
            
        ]);
        
        
        return redirect()->route('home');
    
    }

    public function completed(Todo $todo)
    {
        $lblStatus = $todo->completed ? 'In-Complete' : 'Complete';
        $todo->completed = !$todo->completed;
        $todo->save();

        return redirect()->back()->with([
            'success', 'Todo marked as '. $lblStatus
        ]);
    }

    
    public function delete($id)
    {

        $ToDo = new Todo();
        $tododelete=$ToDo->find($id);
        $tododelete->delete();
        
        $todo_lists = $ToDo->all();

        return redirect()->route('home');

    }


    
}
