<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function voir($id): string
    {
        // Pour l’instant pas de vue, nous verrons ça plus tard.
        return "Vous avez demandé l’id : " . $id;
    }
}
