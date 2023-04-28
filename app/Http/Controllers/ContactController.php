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
     * Funcion para cuando se llame al controlador por el metodo send(), de haber enviado el formulario de contacto.
     * Inyenctandole Request podemos validar lo que recibimos de manera sencilla
     */
    public function send(Request $request){

        /*
         * Con el metodo validate, que recibe como argumentos la request y un arreglo de las reglas de lo que esperamos
         */
        $this->validate($request, [
            "subject" => "required|string|min:5|max:100",
            "message" => "required|string|min:20|max:300"
        ]);
        //de esta manera se puede ver lo que trae la request
        //dd($request->input());
    }

}
