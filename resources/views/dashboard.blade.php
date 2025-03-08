@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Mes Équipements</h1>
            <p class="text-center">Liste des Équipements</p>

            <!-- Displaying success message if any -->
            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <!-- If no equipment exists, show a warning message -->
            @if($equipements->isEmpty())
                <div class="alert alert-warning text-center">Aucun équipement trouvé.</div>
            @else
                <!-- Table to display equipment details -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Quantité</th>
                            <th>État</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipements as $equipement)
                            <tr>
                                <td>{{ $equipement->name }}</td>
                                <td>{{ $equipement->type }}</td>
                                <td>{{ $equipement->quantity }}</td>
                                <td>{{ $equipement->is_operational ? 'Opérationnel' : 'Non opérationnel' }}</td>
                                <td>
                                    <!-- Add action buttons (edit, delete, etc.) -->
                                    <a href="{{ route('equipements.edit', $equipement) }}" class="btn btn-warning">Modifier</a>
                                    <form action="{{ route('equipements.destroy', $equipement) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
