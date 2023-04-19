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

    /*
     * En este metodo devolvera una vista llamada hola2, y los parametros que recibe la vista se le pasan con la funcion
     * compact.
     */
    public function index(string $namee){
        return view("hola2", compact("namee"));
    }
}
