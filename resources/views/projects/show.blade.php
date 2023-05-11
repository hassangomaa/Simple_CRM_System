@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $project->name }}
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-primary float-right">Edit</a>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <p>{{ $project->name }}</p>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <p>{{ $project->description ?? 'N/A' }}</p>
                        </div>

                        <div class="form-group">
                            <label for="client">Client:</label>
                            <p>{{ $project->client->name }}</p>
                        </div>

                        <div class="form-group">
                            <label for="created_at">Created at:</label>
                            <p>{{ $project->created_at }}</p>
                        </div>

                        <div class="form-group">
                            <label for="updated_at">Updated at:</label>
                            <p>{{ $project->updated_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
