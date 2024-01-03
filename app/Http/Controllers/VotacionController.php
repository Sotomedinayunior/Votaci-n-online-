<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use App\Models\Voto;
use Illuminate\Support\Facades\Auth;


class VotacionController extends Controller
{


    public function index(){
        $candidatos = Candidato::all();
        return view('welcome' , compact('candidatos'));
    }
    public function vote(Request $request)
{ if (Auth::check()) {
        $user_id = auth()->user()->id; // ID del usuario autenticado

        // Obtener el ID del candidato desde el campo oculto o el checkbox
        $candidate_id = $request->input('candidato_id_hidden') ?? $request->input('candidato_id_checkbox');

        if (!$candidate_id) {
            // Manejar el caso en que no se proporciona un candidato válido
            return redirect()->route('home')->with('error', 'Debes seleccionar un candidato para votar.');
        }

        // Verificar si el usuario ya ha votado por este candidato
        $existingVote = Voto::where('user_id', $user_id)
                             ->where('candidate_id', $candidate_id)
                             ->first();

        if ($existingVote) {

            return redirect()->route('welcome')->with('error', 'Ya has votado por este candidato.');
        }

        // Crear un nuevo voto en la base de datos
        Voto::create([
            'user_id' => $user_id,
            'candidate_id' => $candidate_id,
        ]);

        return redirect()->route('home')->with('success', 'Voto registrado exitosamente.');
    } else {
        // El usuario no está autenticado, redirigir a la página de inicio de sesión
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para votar.');
    }
}



    //
}