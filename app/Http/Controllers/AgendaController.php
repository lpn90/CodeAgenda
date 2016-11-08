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
        $pessoas = Pessoa::where('apelido', 'like', $letra.'%' )->get();
        return view('index',compact('pessoas'));
    }

}