<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/' , fn() => redirect()->route('task.index') );



/*
|---------------------------------------
|   Fetch All Data And One Single Task
|---------------------------------------
|  
*/
Route::view('/task' , 'index' , [ 'tasks' => Task::latest()->paginate() ])->name('task.index');

Route::get('task/{task}' , function(Task $task){
    
    return view('show' , [ 'task' => $task ]);

})->where('task' , '[0-9]+')->name('task.show');



/*
|----------------------------------
|   Edit And Update Task
|----------------------------------
|  
*/
Route::get('task/{task}/edit' , function( Task $task ){
    
    return view('EditOrStoreForm.form' , ['task' => $task]);

})->name('task.edit');

Route::put('task/{task}/update' , function( TaskRequest $request , Task $task  ){

    $task->update( $request->validated() );

    return redirect()->route('task.show' , ['task' => $task->id])->withSuccess('Task Was Updated');

})->name('task.update');



/*
|----------------------------------
|   Create And Store Task
|----------------------------------
|  
*/
Route::view('task/create' , 'EditOrStoreForm.form')->name('task.create');

Route::post('/task' , function( TaskRequest $request ){

    $task = Task::create( $request->validated() );

    return redirect()->route('task.show' , ['task' => $task])->withSuccess('Task Was Stored');

})->name('task.store');



/*
|----------------------------------
|   Deleteing
|----------------------------------
|  
*/
Route::delete('task/{task}' , function( Task $task ){

    $task->delete();
    return redirect()->route('task.index')->withSuccess('Task Was Deleted');

})->name('task.delete');


/*
|----------------------------------
|   Action Toggel Task
|----------------------------------
|  
*/
Route::put('task/{task}/toggel-task' , function( Task $task ){
    $task->ToggelTask();
    return redirect()->back()->withSuccess('Task Was Updateing');
})->name('task.toggel');



/*
|----------------------------------
|   fallback
|----------------------------------
|  
*/
Route::fallback(function(){
    return abort(404);
});