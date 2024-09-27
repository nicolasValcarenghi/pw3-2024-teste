<?php

namespace App\Http\Controllers;

use App\Mail\AnimalCadastrado;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AnimaisController extends Controller
{
    public function index() {
        $dados = Animal::withTrashed()->get();

        return view('animais.index', [
            'animais' => $dados,
        ]);
    }

    public function cadastrar() {
        return view('animais.cadastrar');
    }

    public function gravar(Request $form) {

        $dados = $form->validate([
            'nome' => 'required|min:3',
            'idade' => 'required|integer'
        ]);

        $animal = Animal::create($dados);

        Mail::to('bernardo7206@gmail.com')->send(new AnimalCadastrado($animal));
        return; 
        // return redirect()->route('animais');
    }

    public function ver(Animal $animal) {
        return view('animais.ver', [
            'animal' => $animal
        ]);
    }

    public function apagar(Animal $animal) {
        return view('animais.apagar', [
            'animal' => $animal,
        ]);
    }

    public function deletar(Animal $animal) {
        $animal->delete();
        return redirect()->route('animais');
    }
}