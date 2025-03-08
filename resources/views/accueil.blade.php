@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-10 text-center">
        <h1 class="text-4xl font-bold text-green-600 mb-4">
            <i class="fas fa-seedling mr-2"></i> Bienvenue sur Farm Management
        </h1>
        <p class="text-gray-700 mb-8">
            Gérez vos équipements et cultures efficacement.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('equipements.index') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg flex items-center">
                <i class="fas fa-tractor mr-2"></i> Mes Équipements
            </a>
            <a href="{{ route('crops.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg flex items-center">
                <i class="fas fa-leaf mr-2"></i> Mes Cultures
            </a>
        </div>
        <div class="mt-8">
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:underline inline-flex items-center">
                <i class="fas fa-tachometer-alt mr-1"></i> Accéder au Tableau de Bord
            </a>
        </div>
    </div>
</div>
@endsection
