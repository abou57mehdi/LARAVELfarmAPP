<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    // Display a list of all equipment
    public function index()
{
    $equipements = auth()->user()->equipements;
    return view('equipements.index', compact('equipements'));
}


    // Show form to create new equipment
    public function create()
    {
        return view('equipements.create');
    }

    // Store new equipment in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'is_operational' => 'required|boolean',
        ]);
    
        auth()->user()->equipements()->create($request->all());
    
        return redirect()->route('equipements.index')->with('success', 'Équipement ajouté avec succès.');
    }
    

    // Display details of a single equipment
    public function show(Equipment $equipment)
    {
        return view('equipements.show', compact('equipment'));
    }

    // Show form to edit equipment
    public function edit(Equipment $equipment)
    {
        return view('equipements.edit', compact('equipment'));
    }

    // Update equipment in the database
    public function update(Request $request, Equipment $equipment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'is_operational' => 'required|boolean',
        ]);

        $equipment->update($request->all());

        return redirect()->route('equipments.index')->with('success', 'Equipment updated successfully!');
    }

    // Delete an equipment
    public function destroy(Equipment $equipement)
{
    if ($equipement->user_id !== auth()->id()) {
        abort(403, 'Accès non autorisé.');
    }

    $equipement->delete();
    return redirect()->route('equipements.index')->with('success', 'Équipement supprimé.');
}

}
