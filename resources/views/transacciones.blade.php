<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tus Transacciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <br>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                              <th scope="col">Codigo Transacción</th>
                              <th scope="col">Fecha</th>
                              <th scope="col">Cuenta Origen</th>
                              <th scope="col">Cuenta Destino Propia</th>
                              <th scope="col">Cuenta Destino Tercero</th>
                              <th scope="col">Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transacciones as $transaccion)
                                <tr>
                                <th scope="row">{{$transaccion->id}}</th>
                                    <td>{{$transaccion->created_at}}</td>
                                    <td>{{$transaccion->nombreorigen}}</td>
                                    <td>{{$transaccion->nombredestinoo}}</td>
                                    <td>{{$transaccion->nombredestinot}}</td> 
                                    <td>$ {{ number_format($transaccion->monto,2)}}</td>    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                
                
            </div>
        </div>
    </div>
</x-app-layout>