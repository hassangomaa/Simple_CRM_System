@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Project Details</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $project->name }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $project->description }}</td>
                            </tr>
                            <tr>
                                <th>Client</th>
                                <td>{{ $project->client->name }}</td>
                            </tr>
                            <tr>
                                <th>Assigned User</th>
                                <td>{{ $project->assignedUser->name }}</td>
                            </tr>
                            <tr>
                                <th>Deadline</th>
                                <td>{{ $project->deadline->format('m/d/Y') }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $project->status ? 'Open' : 'Close' }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
