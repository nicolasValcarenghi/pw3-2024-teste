{{-- resources/views/animais/index.blade.php --}}

@extends('base')

@section('titulo', 'Animais para adoção')

@section('conteudo')
<p>
    <a  href="{{ route('animais.cadastrar') }}"  class="px-4 py-1 text-white font-light tracking-wider bg-blue-800 rounded"><i class="fas fa-plus mr-3"></i> Cadastrar animal</a>
</p>
<p>Veja nossa lista de animais para adoção</p>

<div class="bg-white overflow-auto">
<table border="1" class="min-w-full w-56 bg-white">  
    <thead class="bg-gray-800 text-white ">
    <tr class="bg-gray-800 text-white min-w-full">
        <th class="w-1/2 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
        <th class="w-1/2 text-left py-3 px-4 uppercase font-semibold text-sm">Idade</th>
        <th class="w-1/2 text-left py-3 px-4 uppercase font-semibold text-sm"></th>
    </tr>
</thead>
</div>
    @foreach ($animais as $animal)
    <tr @if ($loop->even) class="bg-gray-200" @endif>
        <div>
        <td class="w-1/2 text-left py-3 px-4">{{ $animal['nome'] }}</td>
        <td class="w-1/2 text-left py-3 px-4">{{ $animal['idade'] }}</td>
        <td class=" text-left py-3 px-4 relative  px-3 py-1 font-semibold text-red-900 leading-tight h-9
         inset-0 bg-red-200 opacity-90 rounded-full"><a href="{{ route('animais.apagar', $animal['id']) }}">Apagar</a></td>
</div>
</tr>
    @endforeach

</table>
@endsection