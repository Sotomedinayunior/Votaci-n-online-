<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $candidato = Candidato::all();
        return view('dashboard.index' , compact('candidato'));

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('dashboard.create');






        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validación para la imagen
        ]);

            $candidate = Candidato::create([
                'nombre' => $validatedData['nombre'],
                'descripcion' => $validatedData['descripcion'],
        ]);

        if($request->hasFile('imagen')){
            $picture = $request->file('imagen');
            $nombre = Str::slug($request->nombre).".".$picture->guessExtension();
            $ruta = public_path('img/');
            $picture->move($ruta , $nombre);
            $candidate->imagen = $nombre;
        }
        $candidate->save();


        return redirect()->route("welcome");
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidato $candidato , $id)
    {
        $candidato = Candidato::find($id);
        return view('dashboard.show' , compact('candidato'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Request $request , $id)
    {
        $candidato = Candidato::find($id);

        return view('dashboard.edit' , compact('candidato'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {   $validatedData = $request->validate([
    'nombre' => 'required|string|max:255',
    'descripcion' => 'required|string',
    'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validación para la imagen
]);

$candidate = Candidato::find($id);

$candidate->nombre = $validatedData['nombre'];
$candidate->descripcion = $validatedData['descripcion'];

if ($request->hasFile('imagen')) {
    $picture = $request->file('imagen');
    $nombre = Str::slug($request->nombre) . "." . $picture->guessExtension();
    $ruta = public_path('img/');
    $picture->move($ruta, $nombre);
    $candidate->imagen = $nombre;
}

$candidate->save();
        return redirect()->route('dashboard.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $candidato = Candidato::find($id);
       $candidato->delete();
       return redirect()->route("dashboard.index")->with("El usuario hacido borrado");

        //
    }
}