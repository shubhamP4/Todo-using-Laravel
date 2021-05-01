<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Todo::all();
        return view('todo',['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $validated = $request->validated();
        $save_task = new Todo;
        $save_task->name = $request->name;
        $save_task->status = 1;
        $save_task->save();
        return redirect('/todo')->with('status','Task has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
       $find_todo = Todo::find($id);
       $find_todo->status = 2;
       $find_todo->update();
       return redirect('/todo')->with('status', 'Task has been completed');
    }

    /**
     * Remove the specified resource from storage.
     * *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_todo = Todo::find($id)->delete();
        return redirect('/todo')->with('status', 'Task has been deleted successfully');
    }
}
