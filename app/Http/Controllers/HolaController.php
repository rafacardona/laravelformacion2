<?php
namespace App\Http\Controllers;

class HolaController extends Controller{
    /*
     * Este metodo se ejecuta cuando se ejecute un controlador desde la ruta sin la llamada
     * a un metodo concreto.
     */
    public function __invoke(string $name)
    {
        return "Hola {$name}!";
    }
}
