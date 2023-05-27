<?php

namespace App\Http\Controllers;

use App\Models\CustomersModel;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $data = CustomersModel::select(
            'customers.id',
            'customers.cus_identification',
            'customers.cus_name',
            'customers.cus_lastname',
            'customers.cus_phone',
            'customers.cus_latitude',
            'customers.cus_altitude',
            'customers.routes_rou_id',
            'routes.rou_name',
            'routes.rou_code'
        )
            ->join('routes', 'routes.id', 'customers.routes_rou_id')
            ->get();

        return response()->json(['message' => 'Consultado Correctamente', 'data' => $data], 200);
    }

    public function getById(Request $request)
    {
        $data = CustomersModel::select(
            'customers.id',
            'customers.cus_identification',
            'customers.cus_name',
            'customers.cus_lastname',
            'customers.cus_phone',
            'customers.cus_latitude',
            'customers.cus_altitude',
            'customers.routes_rou_id',
            'routes.rou_name',
            'routes.rou_code'
        )
            ->join('routes', 'routes.id', 'customers.routes_rou_id')
            ->where('customers.id', $request->idCustomer)
            ->get();

        return response()->json(['message' => 'Consultado Correctamente', 'data' => $data], 200);
    }

    public function getByRoute()
    {
        $data = CustomersModel::select(
            '*'
        )
            ->where('routes_rou_id', $_GET['idRoute'])
            ->get();
        return response()->json(['message' => 'Consultado Correctamente', 'data' => $data], 200);
    }

    public function insert(Request $request)
    {
        $route = new CustomersModel();
        $route->cus_identification = $request->name;
        $route->cus_name = $request->name;
        $route->cus_lastname = $request->lastname;
        $route->cus_phone = $request->phone;
        $route->cus_identification = $request->nit;
        $route->cus_latitude = $request->latitude;
        $route->cus_altitude = $request->altitude;
        $route->routes_rou_id = $request->routeId;
        $route->save();
        return response()->json(['message' => 'Agregado Correctamente', 'data' => $route], 200);
    }

    public function update(Request $request)
    {
        $route = CustomersModel::findOrFail($request->id);
        $route->cus_identification = $request->name;
        $route->cus_name = $request->name;
        $route->cus_lastname = $request->lastname;
        $route->cus_phone = $request->phone;
        $route->cus_identification = $request->nit;
        $route->cus_latitude = $request->latitude;
        $route->cus_altitude = $request->altitude;
        $route->routes_rou_id = $request->routeId;
        $route->save();
        return response()->json(['message' => 'Actualizado Correctamente', 'data' => $route], 200);
    }

    public function delete()
    {
        $route = CustomersModel::findOrFail($_GET['idCustomer']);
        $route->delete();
        return response()->json(['message' => 'Eliminado Correctamente', 'data' => $route], 200);
    }

}
