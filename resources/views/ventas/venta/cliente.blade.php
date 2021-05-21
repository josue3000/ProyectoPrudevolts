{!! Form::open(array('url' =>'ventas/venta.create' ,'method'=> 'GET','autocomplete'=>'off','role'=>'search'))!!}

{{-- {!! Form::open(['route'=>'ventas.venta.create' ,'method'=> 'GET','autocomplete'=>'off']) !!} --}}

        
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="searchText">Cliente</label>
                <select name="searchText" id="searchText" class="form-control selectpicker" data-live-search="true">
                    @foreach ($personas as $persona)
                    <option value="{{$persona->nombre}}">{{$persona->nombre}}</option>
                    @endforeach
                </select>
                
            </div>
                         {{-- <input type="text" class="form-control" name="searchText" placeholder="Buscar ..." value="{{$searchText}}"> --}}
         </div>

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    <div class="form-group">
        <label for="">Categoria de Servicio</label>
        <select name="searchText2" class="form-control selectpicker" id="searchText2" data-live-search="true">
            @foreach ($categoria_servicios as $cat)
            <option value="{{$cat->nombre}}">{{$cat->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>

<span class="form-group-btn">
    <button type="submit" class="btn btn-primary">Seleccionar</button>
</span>



{!! Form::close() !!} 



    
      
          
    

                                  