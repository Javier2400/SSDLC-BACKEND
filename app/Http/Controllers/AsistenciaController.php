<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'hora_entrada' => 'required|date_format:H:i',
            'hora_salida' => 'nullable|date_format:H:i',
            'estado' => 'nullable|string',
        ]);

        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }
        $asistencia = Asistencia::create([
            'user_id' => $user->id,
            'fecha' => $validated['fecha'],
            'hora_entrada' => $validated['hora_entrada'],
            'hora_salida' => $validated['hora_salida'] ?? null,
            'estado' => $validated['estado'] ?? null,
        ]);

        return response()->json(['message' => 'Asistencia registrada', 'asistencia' => $asistencia], 201);
    }


    public function index()
    {
        $asistencias = Asistencia::orderBy('fecha', 'desc')
            ->orderBy('hora_entrada', 'desc')
            ->get();
        return response()->json($asistencias);
    }
}