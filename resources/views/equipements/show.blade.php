@extends('layouts.app')

@section('title', 'Equipment Details')

@section('content')
    <h2>{{ $equipment->name }}</h2>
    <p><strong>Type:</strong> {{ $equipment->type }}</p>
    <p><strong>Purchase Date:</strong> {{ $equipment->purchase_date }}</p>
    <p><strong>Condition:</strong> {{ $equipment->condition }}</p>
    
    <a href="{{ route('equipments.index') }}" class="btn btn-secondary">Back</a>
@endsection
