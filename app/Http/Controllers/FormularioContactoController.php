<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioContacto;

class FormularioContactoController extends Controller
{
    public function index()
    {
        return view('formulario_contacto');
    }

    public function enviar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email',
            'celular' => 'required|string',
            'medioInteres' => 'required|string',
            'programa' => 'required|string',
            'sede' => 'required|string',
        ]);

        // Crear un nuevo registro en la base de datos
        FormularioContacto::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'celular' => $request->celular,
            'medioInteres' => $request->medioInteres,
            'programa' => $request->programa,
            'sede' => $request->sede,
        ]);

        // Devolver una respuesta JSON indicando éxito
        return response()->json(['success' => true]);
    }
}
