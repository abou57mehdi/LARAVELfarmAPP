@extends('layouts.app')

@section('title', 'Mes Cultures')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-leaf mr-2"></i> Mes Cultures
        </h1>
        <a href="{{ route('crops.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            <i class="fas fa-plus-circle mr-1"></i> Ajouter une Culture
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($crops->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
            Aucune culture trouvée.
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">Nom</th>
                        <th class="py-3 px-6 text-left">Type</th>
                        <th class="py-3 px-6 text-left">Date de Plantation</th>
                        <th class="py-3 px-6 text-left">Date de Récolte</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($crops as $crop)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-4 px-6">{{ $crop->name }}</td>
                        <td class="py-4 px-6">{{ $crop->type }}</td>
                        <td class="py-4 px-6">{{ $crop->planting_date }}</td>
                        <td class="py-4 px-6">{{ $crop->harvest_date ?? 'N/A' }}</td>
                        <td class="py-4 px-6 text-center">
                            <a href="{{ route('crops.show', $crop->id) }}" class="text-blue-600 hover:underline mr-2">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('crops.edit', $crop->id) }}" class="text-yellow-500 hover:underline mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('crops.destroy', $crop->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Êtes-vous sûr ?')" class="text-red-600 hover:underline">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
