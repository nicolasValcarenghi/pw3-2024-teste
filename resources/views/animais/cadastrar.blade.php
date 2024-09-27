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

<form method="post" action="{{ route('animais.gravar') }}">
    @csrf
    <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}">
    <br>
    <input type="number" name="idade" placeholder="Idade" value="{{ old('idade') }}">
    <br>
    <input type="submit" value="Gravar">
</form>
@endsection
