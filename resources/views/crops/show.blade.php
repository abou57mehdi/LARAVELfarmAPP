@extends('layouts.app')

@section('title', 'Crop Details')

@section('content')
    <h2>{{ $crop->name }}</h2>
    <p><strong>Type:</strong> {{ $crop->type }}</p>
    <p><strong>Planting Date:</strong> {{ $crop->planting_date }}</p>
    <p><strong>Harvest Date:</strong> {{ $crop->harvest_date ?? 'N/A' }}</p>
    
    <a href="{{ route('crops.index') }}" class="btn btn-secondary">Back</a>
@endsection
