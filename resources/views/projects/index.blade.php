@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Projects
                        <a href="{{ route('projects.create') }}" class="btn btn-primary float-right">Add Project</a>
                    </div>
                    <div class="card-body">
                        @if ($projects->isEmpty())
                            <p>No projects found.</p>
                        @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Client</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>{{ $project->client->name }}</td>
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
                        @endif
                    </div>
                    <div  >
                        {{ $projects->links('vendor.pagination.custom') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

