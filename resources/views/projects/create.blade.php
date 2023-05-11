@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Clients</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>
                                        @if ($client->image)
                                            <img src="{{ asset('storage/images/' . $client->image) }}" alt="{{ $client->name }}" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('clients.show', $client) }}" class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this client?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('clients.create') }}" class="btn btn-primary">Add Client</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
