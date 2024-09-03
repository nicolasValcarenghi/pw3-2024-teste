{{-- views/animais/cadastrar.blade.php --}}

@extends('base')

@section('titulo', 'Cadastrar | Animais para adoção')

@section('conteudo')
<p>Preencha o formulário</p>

@if($errors->any())
<div>
    <h4>Deu ruim</h4>
    @foreach($errors->all() as $erro)
        <p>{{ $erro }}</p>
    @endforeach
</div>  
@endif

<form enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl" method="post" action="{{ route('animais.gravar') }}">
    @csrf
    <div class="">
        <label class="block text-sm text-gray-600" for="nome">Nome</label>
        <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nome" name="nome" type="text" 
        required="" placeholder="Seu Nome" aria-label="Nome">
    </div>
    <br>
    <div class="">
        <label class="block text-sm text-gray-600" for="imagem">Imagem</label>
        <input type="file"  name="imagem" placeholder="imagem" value="{{ old('imagem') }}" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="imagem" name="imagem"
        required="" placeholder="Sua imagem" aria-label="imagem">
    </div>
    <br>
    <div class="">
        <label class="block text-sm text-gray-600" for="idade">Idade</label>
    <input type="number" name="idade" placeholder="Idade" value="{{ old('idade') }}"  class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nome" name="nome" type="text" 
    required="" placeholder="Seu Nome" aria-label="Nome">
 </div>
    <br>
    <input type="submit" value="Gravar" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">
</form>
@endsection
