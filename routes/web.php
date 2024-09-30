<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Task;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::get('/tasks',function () {
    return view('index',[
        'tasks' => Task::all(),
    ]);
})->name('tasks.index');

Route::view('/tasks/create','create');

Route::get('/tasks/{id}', function($id) {
    return view('show',[
        'tasks' => Task::findOrFail($id),
    ]);
})->name('tasks.show');

Route::post('/tasks',function(Request $request){
    $data = $request->validate([
        'titles' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = new Task;
    $task->titles = $data['titles'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->completed = false;
    $task->save();

    return redirect()->route('tasks.show',['id' => $task->id])->with('success','Task created successfully.');
})->name('tasks.store');


Route::get('tasks/{id}/edit', function($id){
    return view('edit',[
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.edit');

Route::put('/tasks/{id}',function($id,Request $request){
    $data = $request->validate([
        'titles' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = Task::findOrFail($id);
    $task->titles = $data['titles'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show',['id'=>$task->id])->with('success','Task updated successfully');
})->name('tasks.update');