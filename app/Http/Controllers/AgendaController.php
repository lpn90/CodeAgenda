<?php
/**
 * User: Leonardo
 * Date: 07/11/2016
 * Time: 14:29
 */

namespace CodeAgenda\Http\Controllers;


use CodeAgenda\Entities\Pessoa;

class AgendaController extends Controller
{
    public function index($letra = "A")
    {
        $letras = array();
        foreach(range('A', 'Z') as $let){
            $pessoas = Pessoa::where('apelido', 'like', $let.'%' )->get();
            if (sizeof($pessoas) > 0)
            {
                $letras[] = $let;
            }
        }

        $letra = $letras[0];
        $pessoas = Pessoa::where('apelido', 'like', $letra.'%' )->get();

        return view('index',compact('pessoas', 'letras'));
    }

}