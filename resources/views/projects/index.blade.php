@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Clients</h3>
                        <div class="card-tools">
                            <a href="{{ route('projects.create') }}" class="btn btn-primary">Add Client</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Assigned User</th>
                                <th>Assigned Client</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->assigned_user_id ? $project->assignedUser->name : '-' }}</td>
                                    <td>{{ $project->assignedClient ? $project->assignedClient->name : '-' }}</td>
                                    <td>{{ $project->status ? 'Open' : 'Closed' }}</td>
                                    <td>{{ $project->deadline ? $project->deadline->format('Y-m-d') : '-' }}</td>
                                    <td>
                                        <a href="{{ route('projects.show', $project) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
        {{ $projects->links('vendor.pagination.custom') }}

    </div>
@endsection
