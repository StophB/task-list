@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>{{ $task->description }}</p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <p>
        @if ($task->completed)
            Completed!
        @else
            Not Completed!
        @endif
    </p>

    <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="post">
        @csrf
        @method('PUT')
        <button type="submit">
            Mask as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
    </form>

    <div>
        <a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit Task</a>
    </div>

    <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection

