<?php

namespace App\Http\Controllers;

use App\Mail\SendContactForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    /*
     * Funcion para cuando se llame al controlador por el metodo index
     */
    public function index(): View
    {
        return view('contact.form');
    }

    /*
     * Funcion para cuando se llame al controlador por el metodo send(), de haber enviado el formulario de contacto.
     * Inyenctandole Request podemos validar lo que recibimos de manera sencilla
     */
    public function send(Request $request)
    {
        try {
            /*
             * Con el metodo validate, que recibe como argumentos la request y un arreglo de las reglas de lo que esperamos
             */
            $this->validate($request, [
                "subject" => "required|string|min:5|max:100",
                "message" => "required|string|min:20|max:300"
            ]);
            //de esta manera se puede ver lo que trae la request
            //dd($request->input());

            /*
             * Aqui vamos a enviar el mail a un usuario con la fachada MAIL y el metodo to.
             * Lo vamos a enviar al primer usuario que encuentre en la base de datos.
             */
            Mail::to(User::first())->send(
                new SendContactForm(
                    $request->input("subject"),
                    $request->input("message"),
                )
            );

            return back()
                ->with("success", "email enviado correctamente");
        } catch (\Exception $e) {
            return back()
                ->with("error", "El email no se ha enviado correctamente");
        }
    }

}
