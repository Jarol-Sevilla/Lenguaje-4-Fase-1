<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    public  function  Evento(){
        return view('enevento');
    }
}