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
                    var url = '{{route('filterR', ['id' => 1]);}}';
                    window.location.href = url.slice(0, -1)+id.value;
                    " value='{{$id}}'>
                      <option value="0" {{ $id == 0 ? 'selected' : '' }}>Todos</option>
                      @foreach ($estados as $estado)
                          <option value="{{ $estado->id }}" {{ $estado->id == $id ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                      @endforeach
                          
                    </select>

                    {{--  Confirmados  --}}
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="small-box bg-aqua">
                          
                          <a href="#" class="small-box-footer">
                          <div class="inner">
                            <h5 style="font-size: 20px;">
                              <strong>Confirmados</strong>
                            </h5>
                            <p>{{$confirmadosTotales}}</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-list" aria-hidden="true"></i>
                          </div>&nbsp;
                           <div class="small-box-footer">
                                 <i class="fa"></i>
                           </div>
                      
                          </a>
                        </div>
                    </div>
                    {{--  Confirmados  --}}

                    {{--  negativos  --}}
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="small-box bg-aqua">
                          
                          <a href="#" class="small-box-footer">
                          <div class="inner">
                            <h5 style="font-size: 20px;">
                              <strong>Negativos </strong>
                            </h5>
                            <p>{{$negativosTotales}}</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-list" aria-hidden="true"></i>
                          </div>&nbsp;
                           <div class="small-box-footer">
                                 <i class="fa"></i>
                           </div>
                      
                          </a>
                        </div>
                    </div>
                    {{--  negativos  --}}

                    {{--  defunciones  --}}
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="small-box bg-aqua">
                          
                          <a href="#" class="small-box-footer">
                          <div class="inner">
                            <h5 style="font-size: 20px;">
                              <strong>Defunciones </strong>
                            </h5>
                            <p>{{$defuncionesTotales}}</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-list" aria-hidden="true"></i>
                          </div>&nbsp;
                           <div class="small-box-footer">
                                 <i class="fa"></i>
                           </div>
                      
                          </a>
                        </div>
                    </div>
                    {{--  defunciones  --}}

                    {{--  sospechosos  --}}
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="small-box bg-aqua">
                          
                          <a href="#" class="small-box-footer">
                          <div class="inner">
                            <h5 style="font-size: 20px;">
                              <strong>Sospechosos </strong>
                            </h5>
                            <p>{{$sospechososTotales}}</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-list" aria-hidden="true"></i>
                          </div>&nbsp;
                           <div class="small-box-footer">
                                 <i class="fa"></i>
                           </div>
                      
                          </a>
                        </div>
                    </div>
                    {{--  sospechosos  --}}
                      
                </div>

            </div>
        </div>
      <chart-component :datos="{{ json_encode($datos) }}"></chart-component>

    </div>
@endsection

