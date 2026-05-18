<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class ExpedienteController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if (empty($query)) {
            return response()->json([]);
        }

        // Búsqueda con Scout y Eager Loading del dueño + Búsqueda por relación
        $resultados = Mascota::search($query)
            ->query(function ($q) use ($query) {
                $q->with('dueno')
                  ->orWhereHas('dueno', function ($queryBuilder) use ($query) {
                      $queryBuilder->where('nombre_completo', 'like', "%{$query}%");
                  });
            })
            ->take(5)
            ->get();

        $formateados = $resultados->map(function ($mascota) {
            return [
                'id' => $mascota->id,
                'nombre' => $mascota->nombre,
                'dueno_nombre' => $mascota->dueno ? $mascota->dueno->nombre_completo : 'Desconocido',
                'dueno_nombre_raw' => $mascota->dueno->nombre_completo ?? '',
                'url' => '#' // Aquí irá la ruta de detalle del expediente
            ];
        });

        return response()->json($formateados);
    }
}
