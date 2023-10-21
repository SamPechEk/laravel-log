@extends('layouts.master')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <label>Filtro</label>
                    <select name="filtro" id="es"  data-live-search="true" required 
                    onchange="
                    var id = document.getElementById('es')
                    var url = '{{route('filterM', ['mes' => 1]);}}';
                    window.location.href = url.slice(0, -1)+id.value;
                    " value='{{$mes}}'>
                      <option value="0" {{ $mes == 0 ? 'selected' : '' }}>Todos</option>
                      @foreach($meses as $mesi)
                          <option value="{{ $mesi['id'] }}" {{ $mesi['id']==$mes ? 'selected' : '' }}>{{ $mesi['nombre'] }}</option>
                      @endforeach
                          
                    </select>

                    
                      
                </div>

            </div>
        </div>
        <h2>Confirmados</h2>
        <top-component :rows="{{ json_encode($estadosMasCasosConfirmados) }}">
          
        </top-component>
        <h2>Defunciones</h2>
        <top-component :rows="{{ json_encode($estadosMasCasosDefunciones) }}">
          
        </top-component>
        <h2>Negativos</h2>
        <top-component :rows="{{ json_encode($estadosMasCasosNegativos) }}">
          
        </top-component>
        <h2>Sospechosos</h2>
        <top-component :rows="{{ json_encode($estadosMasCasosSospechosos) }}">

        </top-component>
    </div>
@endsection

