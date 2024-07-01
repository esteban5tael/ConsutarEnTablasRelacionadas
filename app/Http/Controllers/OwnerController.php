<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /** 
     * Intenta obtener todos los propietarios con sus identificaciones relacionadas.
     */
    public function index()
    {
        try {
            $message = [];
            $owners = Owner::query()
                ->with('identification') // Carga la relación 'identification' para cada propietario
                ->get();

            if ($owners->isEmpty()) {
                $message = ['message' => 'No Owners Founded']; // Mensaje si no se encuentran propietarios
                return response()->json($message, 404); // Retorna respuesta JSON con mensaje de error 404
            }

            $message = [
                'message' => $owners->count() . ' Owners Founded', // Mensaje con el número de propietarios encontrados
                'owners' => $owners // Lista de propietarios encontrados
            ];

            return response()->json($message); // Retorna respuesta JSON con propietarios encontrados
        } catch (\Throwable $th) {
            throw $th; // Captura cualquier excepción y la lanza nuevamente
        }
    }


    /** 
     * Filtra y retorna propietarios cuyo nombre coincida parcialmente con el parámetro $name.
     */
    public function byName($name)
    {
        try {
            $message = [];
            $owners = Owner::query()
                ->with('identification') // Carga la relación 'identification' para cada propietario
                ->where('name', 'like', '%' . $name . '%') // Filtra por nombre parcialmente coincidente
                ->get();

            if ($owners->isEmpty()) {
                $message = ['message' => 'No Owners Found']; // Mensaje si no se encuentran propietarios
                return response()->json($message, 404); // Retorna respuesta JSON con mensaje de error 404
            }

            $message = [
                'message' => $owners->count() . ' Owners Found', // Mensaje con el número de propietarios encontrados
                'owners' => $owners // Lista de propietarios encontrados
            ];

            return response()->json($message); // Retorna respuesta JSON con propietarios encontrados
        } catch (\Throwable $th) {
            throw $th; // Captura cualquier excepción y la lanza nuevamente
        }
    }


   /** 
 * Filtra y retorna propietarios por número de identificación.
 */
public function byNumber($number)
{
    /* Por aquí hay una manera, usando joins */

    try {
        $message = [];
        $owners = Owner::query()
            ->join('identifications', 'owners.id', '=', 'identifications.owner_id')
            ->where('identifications.number', 'like', '%' . $number . '%') // Filtra por número de identificación parcialmente coincidente
            ->select('owners.*', 'identifications.number as identification_number', 'identifications.type as identification_type') // Selecciona los campos necesarios
            ->with('identification') // Carga la relación 'identification' para cada propietario
            ->get();

        if ($owners->isEmpty()) {
            $message = ['message' => 'No Owners Found']; // Mensaje si no se encuentran propietarios
            return response()->json($message, 404); // Retorna respuesta JSON con mensaje de error 404
        }

        $message = [
            'message' => $owners->count() . ' Owners Found', // Mensaje con el número de propietarios encontrados
            'owners' => $owners // Lista de propietarios encontrados
        ];

        return response()->json($message); // Retorna respuesta JSON con propietarios encontrados
    } catch (\Throwable $th) {
        throw $th; // Captura cualquier excepción y la lanza nuevamente
    }

    /* Por aquí hay una segunda manera, usando whereHas */

    try {
        $message = [];
        $owners = Owner::query()
            ->whereHas('identification', function ($query) use ($number) {
                $query->where('number', 'like', '%' . $number . '%'); // Filtra por número de identificación parcialmente coincidente
            })
            ->with('identification') // Carga la relación 'identification' para cada propietario
            ->get();

        if ($owners->isEmpty()) {
            $message = ['message' => 'No Owners Found']; // Mensaje si no se encuentran propietarios
            return response()->json($message, 404); // Retorna respuesta JSON con mensaje de error 404
        }

        $message = [
            'message' => $owners->count() . ' Owners Found', // Mensaje con el número de propietarios encontrados
            'owners' => $owners // Lista de propietarios encontrados
        ];

        return response()->json($message); // Retorna respuesta JSON con propietarios encontrados
    } catch (\Throwable $th) {
        throw $th; // Captura cualquier excepción y la lanza nuevamente
    }
}




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOwnerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        //
    }
}
