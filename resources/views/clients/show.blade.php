@extends('layouts.admin')


@section('content')
    <div class="container">
        <h1>{{ $client->name }}</h1>
        <p>Email: {{ $client->email }}</p>
        <p>Phone: {{ $client->phone }}</p>
        @if ($client->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->name }}" class="img-thumbnail">
            </div>
        @endif
        <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary">Edit</a>
        <form method="POST" action="{{ route('clients.destroy', $client) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client?')">Delete</button>
        </form>
    </div>
@endsection
