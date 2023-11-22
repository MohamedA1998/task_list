@extends('layout.app')

@section('title' , 'The List OF Task')

@section('content')

    <nav class="mb-4">
        <a href="{{ route('task.create') }}" class="font-medium text-gray-700 underline decoration-pink-500">Create New Task</a>
    </nav>

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('task.show' , ['task' => $task]) }}"
                @class(['font-medium' , 'line-through' => $task->completed])>
                {{ $task->title }}
            </a>
        </div>        
    @empty
        <div>
            No Task Yet
        </div>
    @endforelse

    
    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif

@endsection