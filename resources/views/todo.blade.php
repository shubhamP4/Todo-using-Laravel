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
                <form action="{{ route('store')}} " method="POST">
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
                        <form id="formName"  method="POST" action="{{ route('update',$task->id) }}">
                            @csrf
                            @method('PUT')
                            <li class="ui-state-default">
                                <div class="checkbox">
                                    <label><input type="text" value="hello{{ $task->id }}" name="status"/> {{ $task->name }}</label>
                                    <button type="submit" name="button">Submit</button>
                                </div>
                            </li>
                        </form>
                        @endif
                    @endforeach
                </ul>
                <div class="card-header">
                    <strong><span class="count-todos"></span></strong> Items Left
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="todolist">
             <h3>Already Done</h3>
                <ul id="done-items" class="list-unstyled">
                 @foreach($tasks as $task)
                    @if ($task->status==2)
                        <li>Some item <button class="remove-item btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-remove"></span></button></li>
                    @endif
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

