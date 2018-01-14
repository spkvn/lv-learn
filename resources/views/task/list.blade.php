@extends('layout.main')
@section('content')
    <div id="root" class="container">
        <h1 class="title">Tasks</h1>
        <form action="/task" method="POST" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            {!! csrf_field() !!}

            <div class="control">
                <label for="name" class="label">Task Name: </label>
                <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                <input type="text" id="name" name="name" class="input" v-model="form.name">
            </div>

            <div class="control">
                <label for="description" class="label">Task Description: </label>
                <span class="help is-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                <input type="text" id="description" name="description" class="input" v-model="form.description" >
            </div>

            <div class="control">
                <button class="button is-primary" :class="{'is-loading' : form.working}" :disabled="form.errors.any()">Create</button>
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