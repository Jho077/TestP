<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Deporte;



class DeporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $deportes = Deporte::all();
            return Inertia::render('Deporte', [
                'deportes' => $deportes
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nivel' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Deporte::create([
            'nombre' => $request->nombre,
            'nivel' => $request->nivel,
            'descripcion' => $request->descripcion,
        ]);

        return Redirect::route('Deporte');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
