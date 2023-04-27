<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    /*
     * Funcion para cuando se llame al controlador por el metodo index
     */
    public function index(): View{
        return view('contact.form');
    }

    /*
     * Funcion para cuando se llame al controlador por el metodo send(), de haber enviado el formulario de contacto
     */
    public function send(){

    }

}
