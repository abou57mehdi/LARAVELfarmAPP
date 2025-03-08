<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crop;

class CropController extends Controller
{
    // Display a list of all crops
    public function index()
    {
        $crops = Crop::all();
        return view('crops.index', compact('crops'));
    }

    // Show form to create a new crop
    public function create()
    {
        return view('crops.create');
    }

    // Store a new crop in the database
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'planting_date' => 'required|date',
        'harvest_date' => 'required|date',
    ]);

    // Create the crop and associate it with the authenticated user
    auth()->user()->crops()->create([
        'name' => $request->name,
        'type' => $request->type,
        'planting_date' => $request->planting_date,
        'harvest_date' => $request->harvest_date,
    ]);

    return redirect()->route('crops.index')->with('success', 'Crop added successfully!');
}



    // Display details of a single crop
    public function show(Crop $crop)
    {
        return view('crops.show', compact('crop'));
    }

    // Show form to edit a crop
    public function edit(Crop $crop)
    {
        return view('crops.edit', compact('crop'));
    }

    // Update a crop in the database
    public function update(Request $request, Crop $crop)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'planting_date' => 'required|date',
            'harvest_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $crop->update($request->all());

        return redirect()->route('crops.index')->with('success', 'Crop updated successfully!');
    }

    // Delete a crop
    public function destroy(Crop $crop)
    {
        $crop->delete();
        return redirect()->route('crops.index')->with('success', 'Crop deleted successfully!');
    }
}
