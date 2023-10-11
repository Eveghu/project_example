<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TrainerController;
use Illuminate\Http\Request;
use App\Models\Trainer;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $trainer=Trainer::all();
        return view ('index',compact('trainer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'apellido' => 'required|string',
        'avatar' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
    ]);

    // Procesar y guardar la imagen de avatar
    if ($request->hasFile('avatar')) {
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
    }

    // Crear el entrenador con los datos y la ruta del avatar
    Trainer::create([
        'name' => $request->input('name'),
        'apellido' => $request->input('apellido'),
        'avatar' => $avatarPath, // Guarda la ruta del avatar en la base de datos
    ]);

    return redirect()->route('trainers.index')->with('success', 'Entrenador creado con éxito.');
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