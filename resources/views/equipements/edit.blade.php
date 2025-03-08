@extends('layouts.app')

@section('title', 'Edit Equipment')

@section('content')
    <h2>Edit Equipment</h2>
    <form action="{{ route('equipments.update', $equipment) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $equipment->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" value="{{ $equipment->type }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Purchase Date</label>
            <input type="date" name="purchase_date" class="form-control" value="{{ $equipment->purchase_date }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Condition</label>
            <select name="condition" class="form-control">
                <option value="New" {{ $equipment->condition == 'New' ? 'selected' : '' }}>New</option>
                <option value="Used" {{ $equipment->condition == 'Used' ? 'selected' : '' }}>Used</option>
                <option value="Needs Repair" {{ $equipment->condition == 'Needs Repair' ? 'selected' : '' }}>Needs Repair</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('equipments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
