@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $project->exists ? 'Edit Project' : 'Add Project' }}</div>

                    <div class="card-body">
                        @if ($project->exists)
                            <form action="{{ route('projects.update', $project) }}" method="POST">
                                @method('PUT')
                                @else
                                    <form action="{{ route('projects.store') }}" method="POST">
                                        @endif
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $project->name) }}" required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="client_id">Client</label>
                                            <select name="client_id" id="client_id" class="form-control @error('client_id') is-invalid @enderror" required>
                                                <option value="">Select a client</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}" @if ($client->id == old('client_id', $project->client_id)) selected @endif>{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('client_id')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">{{ $project->exists ? 'Save Changes' : 'Add Project' }}</button>
                                            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
