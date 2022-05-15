<div class="p-6 sm:px-20 bg-white border-b border-gray-200">

    

    <div class="mt-8 text-2xl">
        Vamos a transferir fondos entre tus propias cuentas!
    </div>
    <br>

    
<form id="fTransaccionPropia" action="/transaccion-crea" method="POST">

    @csrf   
    <div id = "form-errors">
        {!! $errors->first('cuentapropias_sale_id','<small><div class="alert alert-danger" role="alert">:message</div></small>') !!}
        {!! $errors->first('cuentapropias_entra_id','<small><div class="alert alert-danger" role="alert">:message</div></small>') !!}
        {!! $errors->first('monto','<small><div class="alert alert-danger" role="alert">:message</div></small>') !!}
    </div>
    @if ($message)
        <div class="alert alert-primary" role="alert">
            {{ $message }}
        </div>
    @endif
        

    <div class="row">
        <div class="col">
            <label for="cuentapropias_sale_id">Cuenta Origen</label>
            <select name="cuentapropias_sale_id" class="form-select" aria-label="Default select example" value= {{ old('cuentapropias_sale_id') }}>
                <option>Seleccionar</option>
                @foreach ($cuentas as $cuenta)
                    <option value="{{$cuenta->id}}"> {{ $cuenta->nombre }}</option> 
                @endforeach
              </select>
        </div>
        <div class="col">
            <label for="cuentapropias_entra_id">Cuenta Destino</label>
            <select  name="cuentapropias_entra_id" class="form-select" aria-label="Default select example" value= {{ old('cuentapropias_entra_id') }} >
                <option>Seleccionar</option>
                @foreach ($cuentas as $cuenta)
                    <option value="{{$cuenta->id}}"> {{ $cuenta->nombre }}</option> 
                @endforeach
              </select>
        </div>
        <div class="col">
            <label for="monto">Monto a transferir</label>
            <input  name="monto" class="form-control" type="number" step="0.01" placeholder="Cantidad transferir..." aria-label="default input example" value= {{ old('monto') }}>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-success">Transferir</button>
        </div>
    </div>
</form>
</div>

