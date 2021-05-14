<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Form;
use Validator;

class TaskController extends Controller
{   public function __construct(){
    $this ->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->form_id) {
        $tasks = Task::where('form_id', $request->form_id)->get();
        $filterBy = $request->form_id;
        } else {
        $tasks = Task::all();
        }
        // orderBy('completed')->get()

        if ($request->sort && 'asc' == $request->sort) {
        $tasks = $tasks->sortBy('task_name');
        $sortBy = 'asc';
        } elseif ($request->sort && 'desc' == $request->sort) {
        $tasks = $tasks->sortByDesc('completed_date');
        $sortBy = 'desc';
        }
        $forms = Form::orderBy('name')->get();
        return view('task.index', [
        'tasks' => $tasks,
        'forms' => $forms,
        'filterBy' => $filterBy ?? 0,
        'sortBy' => $sortBy ?? ''
        ]);
   
      $tasks = Task::orderBy('add_date')->get();
      return view('task.index', ['tasks' => $tasks]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $forms = Form::all();
       return view('task.create',['forms' => $forms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   
   {
      
       $validator = Validator::make($request->all(),
       [
           'task_name' => ['required', 'min:4', 'max:64'],
           'task_description' => ['required', 'min:3', 'max:64'],
       ],
      [
      'task_name.min' => 'per trumpas pavadinimas',
      'task_description.required' => 'uzpildyk "descriptio" laukeli'
      ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }




       $task = new Task;
       $task->task_name = $request->task_name;
       $task->task_description = $request->task_description;
       $task->add_date = $request->add_date;
       $task->completed_date = $request->completed_date;
       $task->form_id = $request->form_id;
       $task->save();
       return redirect()->route('task.index') ->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $forms = Form::all();
        return view('task.edit', ['task' => $task, 'forms' => $forms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {$validator = Validator::make($request->all(),
       [
           'task_name' => ['required', 'min:4', 'max:64'],
           'task_description' => ['required', 'min:3', 'max:64'],
       ],
      [
      'task_name.min' => 'per trumpas pavadinimas',
      'task_description.required' => 'uzpildyk "descriptio" laukeli'
      ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

       $task->task_name = $request->task_name;
       $task->task_description = $request->task_description;
       $task->add_date = $request->add_date;
       $task->completed_date = $request->completed_date;
       $task->form_id = $request->form_id;
       $task->save();
       return redirect()->route('task.index')->with('success_message', 'Sėkmingai pakeistas.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
      $task->delete();
       return redirect()->route('task.index')->with('success_message', 'Sekmingai ištrintas.');


    }
}
