<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Task;
use App\Http\Requests\TaskRequest;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::get('/tasks',function () {
    return view('index',[
        'tasks' => Task::all(),
    ]);
})->name('tasks.index');

Route::view('/tasks/create','create');

Route::get('/tasks/{task}', function(Task $task) {
    return view('show',[
        'tasks' => $task,
    ]);
})->name('tasks.show');

Route::post('/tasks',function(TaskRequest $request){
    // $data = $request->validated();
    // $task = new Task;
    // $task->titles = $data['titles'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->completed = false;
    // $task->save();

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show',['task' => $task->id])->with('success','Task created successfully.');
})->name('tasks.store');


Route::get('tasks/{task}/edit', function(Task $task){
    return view('edit',[
        'task' => $task
    ]);
})->name('tasks.edit');

Route::put('/tasks/{task}',function(Task $task,TaskRequest $request){
    // $data = $request->validated(); 
    
    $task->update($request->validated());

    return redirect()->route('tasks.show',['task'=>$task])->with('success','Task updated successfully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task){
    $task->delete();

    return redirect()->route('tasks.index')->with('success','Task deleted successfully');
})->name('tasks.destroy');