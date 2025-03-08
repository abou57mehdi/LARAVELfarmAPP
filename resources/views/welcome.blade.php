{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-10 rounded-lg shadow-lg text-center">
        <h1 class="text-4xl font-bold text-green-600 mb-4">
            <i class="fas fa-seedling mr-2"></i> Welcome to the Farm Management System
        </h1>
        <p class="text-gray-700 mb-8">Manage your crops and equipment efficiently!</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow flex items-center justify-center">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                </a>
            @endif

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow flex items-center justify-center">
                    <i class="fas fa-user-plus mr-2"></i> Register
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
