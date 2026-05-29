<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Graduate;
use App\Models\KnowledgeArea;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConsultasController extends Controller
{
    public function companies(Request $request): Response
    {
        $perPage = (int) $request->query('perPage', 0);

        $query = Company::query()->select(['id', 'nombre_empresa']);

        if ($perPage > 0) {
            return response()->json($query->paginate($perPage));
        }

        return response()->json($query->get());
    }

    public function knowledgeAreas(Request $request): Response
    {
        $perPage = (int) $request->query('perPage', 0);

        $query = KnowledgeArea::query()->select(['id', 'nombre_area']);

        if ($perPage > 0) {
            return response()->json($query->paginate($perPage));
        }

        return response()->json($query->get());
    }

    public function graduates(Request $request): Response
    {
        $perPage = (int) $request->query('perPage', 0);

        // Incluye la ciudad si existe, para evitar N+1 en listados
        $query = Graduate::query()->with(['city'])->select(['id', 'nombre', 'apellido', 'telefono', 'correo', 'city_id']);

        if ($perPage > 0) {
            return response()->json($query->paginate($perPage));
        }

        return response()->json($query->get());
    }
}

