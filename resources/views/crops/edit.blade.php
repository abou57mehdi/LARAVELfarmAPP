@extends('layouts.app')

@section('title', 'Edit Crop')

@section('content')
    <h2>Edit Crop</h2>
    <form action="{{ route('crops.update', $crop) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $crop->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" value="{{ $crop->type }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Planting Date</label>
            <input type="date" name="planting_date" class="form-control" value="{{ $crop->planting_date }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harvest Date</label>
            <input type="date" name="harvest_date" class="form-control" value="{{ $crop->harvest_date }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('crops.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
