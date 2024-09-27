<?php

namespace App\Http\Controllers;

use App\Mail\AnimalCadastrado;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AnimaisController extends Controller
{
    public function index()
    {
        $dados = Animal::get();
        // withTrashed - Com apagados
        // onlyTrashed - Apenas apagados
        // somente get() - Acesso normal aos não apagados

        $animaisPorIdade = Animal::groupBy('idade')
            ->selectRaw('idade, count(*) as quantidade')
            ->get();

        return view('animais.index', [
            'animais' => $dados,
            'animaisPorIdade' => $animaisPorIdade,
        ]);
    }

    public function cadastrar()
    {
        return view('animais.cadastrar');
    }

    public function gravar(Request $form)
    {
        $img = $form->file('imagem')->store('animais', 'imagens');
        
        $dados = $form->validate([
            'nome' => 'required|min:3',
            'idade' => 'required|integer',
        ]);

        $dados['imagem'] = $img;

        #Animal::create($dados);
        Mail::to('alguem@batata.com')->send(new AnimalCadastrado);
        return;
        #return redirect()->route('animais');
    }

    public function apagar(Animal $animal)
    {
        return view('animais.apagar', [
            'animal' => $animal,
        ]);
    }

    public function deletar(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animais');
    }
}
