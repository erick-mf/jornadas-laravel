<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $inscripciones = $user->inscripciones()->with('evento')->get();

        return view('dashboard', compact('inscripciones'));
    }
}
