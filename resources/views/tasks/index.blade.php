@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Tasks</h3>
                        <div class="card-tools">
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Project') }}</th>
                                <th>{{ __('Completed') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->project->name }}</td>
                                    <td>{{ $task->completed ? __('Yes') : __('No') }}</td>
                                    <td>
                                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-primary">{{ __('View') }}</a>
                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-secondary">{{ __('Edit') }}</a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
