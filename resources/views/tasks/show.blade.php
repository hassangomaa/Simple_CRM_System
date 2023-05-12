@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $task->name }}</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Description') }}</label>
                            <p>{{ $task->description }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Project') }}</label>
                            <p>{{ $task->project->name }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Status') }}</label>
                            @if($task->completed)
                                <span class="badge badge-success">{{ __('Completed') }}</span>
                            @else
                                <span class="badge badge-warning">{{ __('Not Completed') }}</span>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary mr-2">{{ __('Edit Task') }}</a>

                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('Delete Task') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
