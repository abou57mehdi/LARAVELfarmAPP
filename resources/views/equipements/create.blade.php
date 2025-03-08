@extends('layouts.app')

@section('title', 'Add Equipment')

@section('content')
    <h2>Add Equipment</h2>
    <form action="{{ route('equipements.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" name="type" id="type" required>
    </div>
    <div class="form-group">
        <label for="quantity">Quantité</label>
        <input type="number" class="form-control" name="quantity" id="quantity" required>
    </div>
    <div class="form-group">
        <label for="is_operational">État</label>
        <select name="is_operational" id="is_operational" class="form-control">
            <option value="1">Opérationnel</option>
            <option value="0">Non opérationnel</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

@endsection
