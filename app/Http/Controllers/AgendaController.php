<?php
/**
 * User: Leonardo
 * Date: 07/11/2016
 * Time: 14:29
 */

namespace CodeAgenda\Http\Controllers;


use CodeAgenda\Entities\Pessoa;
use CodeAgenda\Entities\Telefone;

class AgendaController extends Controller
{
    public function index($letra = "nll")
    {
        $letras = array();
        foreach(range('A', 'Z') as $let){
            $pessoas = Pessoa::where('apelido', 'like', $let.'%' )->get();
            if (sizeof($pessoas) > 0)
            {
                $letras[] = $let;
            }

        }
        if ($letra == "nll" && sizeof($letras)>0){
            $letra = $letras[0];
        }

        $pessoas = Pessoa::where('apelido', 'like', $letra.'%' )->get();

        return view('index',compact('pessoas', 'letras'));
    }
    
    public function search()
    {
        $nome = $_POST['nome'];

        $pessoas = Pessoa::where('apelido', 'like', '%'.$nome.'%' )->get();

        return view('search',compact('pessoas'));
    }

    public function pessoaDelete(int $code)
    {
        Pessoa::find($code)->delete();
        return redirect()->route('agenda.index');
    }
    public function telefoneDelete(int $code)
    {
        Telefone::find($code)->delete();
        return redirect()->route('agenda.index');
    }

}