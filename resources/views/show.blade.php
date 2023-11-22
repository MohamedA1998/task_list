@extends('layout.app')

@section('title' , $task->title)

@section('content')

    <div class="mb-4">
        <a href="{{ route('task.index') }}" class="font-medium text-gray-700 underline decoration-pink-500">← Go back to the task list</a>
    </div>


    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ( $task->longDescription )
        <p class="mb-4 text-slate-700">{{ $task->longDescription }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">{{ $task->created_at->diffForHumans() }} • {{ $task->updated_at->diffForHumans() }}</p>

    <p>
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </p>






    


    


    <div class="flex gap-2">
        <a href="{{ route('task.edit'   , ['task' => $task->id]) }}"
            class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Edit Task</a>

        <form action="{{ route('task.toggel' , ['task' => $task]) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">
                Mark As {{ $task->completed ? 'Not Completed' : 'Completed' ; }}
            </button>
        </form>
        
        <form action="{{ route('task.delete' , ['task' => $task->id]) }}" method="post" id="SubmitFormDelete">
            @csrf
            @method('DELETE')
            <button type="submit" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">
                Delete Task
            </button>
        </form>
        
    </div>
    
@endsection
