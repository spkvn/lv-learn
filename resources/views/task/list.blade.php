@extends('layout.main')
@section('content')
    <div id="root" class="container">
        <h1 class="title">Tasks</h1>
        <form action="/task" method="POST">
            {!! csrf_field() !!}
            <div class="control">
                <label for="name" class="label">Task Name: </label>
                <input type="text" id="name" name="name" class="input">
            </div>
            <div class="control">
                <label for="description" class="label">Task Description: </label>
                <input type="text" id="description" name="description" class="input">
            </div>
            <div class="control">
                <button class="button is-primary">Create</button>
            </div>
        </form>
        <!-- Tasks -->
        <div class="tasks">
            @forelse($tasks as $task)
                <p class="subtitle">{{$task->name}}</p>
                <p>{{$task->description}}</p>
            @empty
            @endforelse
        </div>
    </div>
@endsection