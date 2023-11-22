@extends('layout.app')

@section('title' , isset($task) ? 'Edite Task' : 'Add Task' )

@section('content')

    <form method="POST" action="{{ isset( $task ) ? route('task.update' , ['task' => $task->id]) : route('task.store') ; }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div class="mb-6">
            <label class="block uppercase text-slate-700 mb-2" for="title">Title</label>
            <input type="text" class="@error('title') border-red-500 @enderror shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none"
                name="title" id="title" value="{{ $task->title ?? old('title') }}" />
            @error('title')
                <p class="error text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block uppercase text-slate-700 mb-2" for="description">Description</label>
            <textarea name="description" class="@error('title') border-red-500 @enderror shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none"
                id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block uppercase text-slate-700 mb-2" for="LongDescription">longDescription</label>
            <textarea name="longDescription" class="@error('title') border-red-500 @enderror shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none"
                id="LongDescription" rows="6">{{ $task->longDescription ?? old('longDescription') }}</textarea>
            @error('longDescription')
                <p class="error text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>


        <div class="flex items-center gap-2">
            <button type="submit" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">
                @isset($task)
                    Update Task
                @else
                    Create Task
                @endisset
            </button>

            <a href="{{ route('task.index') }}" class="font-medium text-gray-700 underline decoration-pink-500" >Cancel</a>
        </div>
        
        
    </form>

@endsection