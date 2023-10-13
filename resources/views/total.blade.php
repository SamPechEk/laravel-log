<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="small-box bg-aqua">
                          
                          <a href="rptasistencia.php" class="small-box-footer">
                          <div class="inner">
                            <h5 style="font-size: 20px;">
                              <strong>Reporte de asistencias </strong>
                            </h5>
                            <p>Módulo</p>
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
                      
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="small-box bg-red">
                          
                          <a href="rptQuincenalesEscolarizado.php" class="small-box-footer">
                          <div class="inner">
                            <h5 style="font-size: 20px;">
                              <strong>R.Q Escolarizado </strong>
                            </h5>
                            <p>Módulo</p>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
