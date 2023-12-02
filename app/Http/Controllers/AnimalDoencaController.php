<?php

namespace App\Http\Controllers;

use App\Models\AnimalDoenca;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalDoencaController extends Controller
{

    public function privateIndex(Animal $animal)
    {

        $doencas = AnimalDoenca::where('id_animal', '=', $animal->id)->get();

        return view('private.animal.doenca.index', compact('doencas'));
    }

}
