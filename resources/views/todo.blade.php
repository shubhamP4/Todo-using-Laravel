@extends('layouts/app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="todolist not-done">
                <h3>Todos</h3>
                @if (session('status'))
                <div class="alert alert-success mt-2">
                    {{ session('status') }}
                </div>
                @endif
                <form action="{{ route('todo.store')}} " method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control add-todo @error('name') is-invalid @enderror" placeholder="Add todo">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <button id="checkAll" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Task</button>
                </form>
                <hr>
                <ul id="sortable" class="list-unstyled">
                    @foreach($tasks as $task)
                    @if ($task->status==1)
                    <form id="formName{{ $task->id }}" method="POST" action="{{ route('todo.update',$task->id) }}">
                        @csrf
                        @method('PUT')
                        <li class="ui-state-default">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="hello{{ $task->id }}" name="status" onchange="document.getElementById('formName{{ $task->id }}').submit()" />
                                    {{ $task->name }}
                                </label>
                            </div>
                        </li>
                    </form>
                    @endif
                    @endforeach
                </ul>
                <div class="card-header">
                    <strong><span class="count-todos"></span></strong> Total Tasks  {{$task->count()}} 
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="todolist">
                <h3>Already Done</h3>
                <ul id="done-items" class="list-unstyled">
                    @foreach($tasks as $task)
                    @if ($task->status==2)
                    <li>
                        {{ $task->name}} 
                        <form action="{{ route('todo.destroy',$task->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-item btn btn-danger btn-xs pull-right" style="margin-top: -30px;">
                        <i class="fa fa-remove"></i>
                        </button>
                        </form>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
