<?php

namespace App\Http\Controllers;

use App\Models\RoutesModel;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function index()
    {
        $data = RoutesModel::all();
        return response()->json(['message' => 'Consultado Correctamente', 'data' => $data], 200);
    }

    public function getById($request)
    {
        $data = RoutesModel::select(
            '*'
        )
            ->where('id', $request)
            ->get();
        return response()->json(['message' => 'Consultado Correctamente', 'data' => $data], 200);
    }

    public function insert(Request $request)
    {
        $route = new RoutesModel();
        $route->rou_name = $request->name;
        $route->rou_code = $request->code;
        $route->start_lat = $request->start_lat;
        $route->start_lng = $request->start_lng;
        $route->end_lat = $request->end_lat;
        $route->end_lng = $request->end_lng;
        $route->save();
        return response()->json(['message' => 'Agregado Correctamente', 'data' => $route], 200);
    }

    public function update(Request $request)
    {
        $route = RoutesModel::findOrFail($request->id);
        $route->rou_name = $request->name;
        $route->rou_code = $request->code;
        $route->start_lat = $request->start_lat;
        $route->start_lng = $request->start_lng;
        $route->end_lat = $request->end_lat;
        $route->end_lng = $request->end_lng;
        $route->save();
        return response()->json(['message' => 'Actualizado Correctamente', 'data' => $route], 200);
    }

    public function delete()
    {
        $route = RoutesModel::findOrFail($_GET['idRoute']);
        $route->delete();
        return response()->json(['message' => 'Eliminado Correctamente', 'data' => $route], 200);
    }
}
