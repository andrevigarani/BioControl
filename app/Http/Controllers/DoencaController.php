<?php

namespace App\Http\Controllers;

use App\Models\Doenca;
use Illuminate\Http\Request;

class DoencaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('private.doenca.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Doenca $doenca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doenca $doenca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doenca $doenca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doenca $doenca)
    {
        //
    }
}
