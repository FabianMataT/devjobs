<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('viewAny', Vacante::class)) {
            return view('vacantes.index');
        }
        abort(403);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('create', Vacante::class)) {
            return view('vacantes.create');
        }
        abort(403);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes.show', [
            'vacante' => $vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        if (auth()->user()->can('update', $vacante)) {
            return view('vacantes.edit', [
                'vacante'=>$vacante
            ]);
        }
        abort(403);
    }
}
