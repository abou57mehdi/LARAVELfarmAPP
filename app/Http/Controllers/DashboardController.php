<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetching the crops and equipements for the authenticated user
        $crops = auth()->user()->crops;
        $equipements = auth()->user()->equipements;

        // Return the view and pass the data
        return view('dashboard', compact('crops', 'equipements'));
    }
}
