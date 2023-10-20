<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TrainerController;
use Illuminate\Http\Request;
use App\Models\Trainer;
use Illuminate\Support\Facades\Storage;
use File;


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
    public function show(Trainer $trainer)
    {
        //return 'tengo que regresar el id';
        //return view("show");
    return view('show', compact('trainer'));
}

        //return $trainer;
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        //
        //return $trainer;
        return view ('edit',compact('trainer'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([
            'name' => 'required|string',
            'apellido' => 'required|string',
            'avatar' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048', // Asegúrate de que 'avatar' sea un campo opcional
        ]);
    
        if ($request->hasFile('avatar')) {
            // Guardar la nueva imagen
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            
            // Borrar la imagen anterior si existe
            $imagePath = public_path('avatars/' . $trainer->avatar);
    
            // Actualizar la ruta de la imagen en la base de datos
            $trainer->update([
                'name' => $request->input('name'),
                'apellido' => $request->input('apellido'),
                'avatar' => $avatarPath,
            ]);
        } else {
            // Si no se subió una nueva imagen, solo actualizar los otros campos
            $trainer->update([
                'name' => $request->input('name'),
                'apellido' => $request->input('apellido'),
            ]);
        }
    
        return redirect()->route('trainers.show', ['trainer' => $trainer])->with('success', 'Entrenador actualizado con éxito.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
        public function destroy(string $id)
{
    $trainer = Trainer::find($id); // Obtén el cliente por su ID

    if ($trainer) {
        // Borra la imagen asociada al cliente si existe
        $imagePath = public_path('}avatar/' . $trainer->image); // Ruta a la imagen en el sistema de archivos
        if (file_exists($imagePath)) {
            unlink($imagePath); // Elimina la imagen
        }

        // Elimina el cliente
        $trainer->delete();
        return redirect("/trainers");
    }
}
}
