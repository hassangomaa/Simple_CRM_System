@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $client->exists ? 'Edit Client' : 'Add Client' }}</div>

                    <div class="card-body">
                        @if ($client->exists)
                            <form action="{{ route('clients.update', $client) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @else
                                    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                                        @endif
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $client->name) }}" required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control
@error('email')
<span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $client->phone) }}" required>
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror

                                            @if ($client->image)
                                                <img src="{{ asset('storage/images/' . $client->image) }}" alt="{{ $client->name }}" width="100" height="100">
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">{{ $client->exists ? 'Save Changes' : 'Add Client' }}</button>
                                            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
