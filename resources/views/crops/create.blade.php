@extends('layouts.app')

@section('title', 'Add Crop')

@section('content')
    <h2>Add Crop</h2>
    <form action="{{ route('crops.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Crop Name</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" name="type" id="type" required>
    </div>
    <div class="form-group">
        <label for="planting_date">Planting Date</label>
        <input type="date" class="form-control" name="planting_date" id="planting_date" required>
    </div>
    <div class="form-group">
        <label for="harvest_date">Harvest Date</label>
        <input type="date" class="form-control" name="harvest_date" id="harvest_date" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Crop</button>
</form>

@endsection
