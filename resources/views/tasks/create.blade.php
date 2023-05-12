@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Task') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project_id" class="col-md-4 col-form-label text-md-right">{{ __('Project') }}</label>

                                <div class="col-md-6">
                                    <select id="project_id" class="form-control @error('project_id') is-invalid @enderror" name="project_id" required>
                                        <option value="">{{ __('Select a project') }}</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('project_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Completed') }}</label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="completed" id="completed_yes" value="1" {{ old('completed') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="completed_yes">{{ __('Completed') }}</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="completed" id="completed_no" value="0" {{ old('completed') == '0' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="completed_no">{{ __('Not Completed') }}</label>
                                    </div>

                                    @error('completed')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                                                            </span>
                                    @enderror
                                </div>
                            </div>
                                                  </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Create Task') }}
                                                </button>
                                            </div>
                                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

