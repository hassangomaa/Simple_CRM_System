@extends('layouts.app')

@section('title', 'Page Not Found - 404 Error')

@section('content')

    <h1>Oops! Page Not Found</h1>

    <div class="error-page"  >
        <h2 class="headline text-warning">404</h2>
        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! We couldn't find that page.</h3>
            <p>It looks like the page you're looking for doesn't exist. You can <a href="{{ route('home') }}">return to the home page</a> or use the search form below to find what you're looking for:</p>

        </div>
    </div>

@endsection
