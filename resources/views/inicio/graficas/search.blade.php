{!! Form::open(array('url' =>'inicio/graficas' ,'method'=> 'GET' ,'autocomplete'=>'off','role'=>'search' ))!!}
{{-- <div class="title_right">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <div class="input-group">
           
            <select name="searchText" class="form-control selectpicker" id="searchText" data-live-search="true">
                
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021" selected>2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
             
            </select>
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </span>
        
            </div>
        
        </div>
        </div>
</div> --}}





<div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <select name="searchText" class="form-control selectpicker" id="searchText" >
                

            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
         
        </select>

        {{-- {!! Form::select('searchText',['2021'=>'2021','2022'=>'2022','2023'=>'2023','2024'=>'2024','2025'=>'2025']) !!} --}}
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">Buscar!</button>
        </span>
      </div>
    </div>
  </div>


{{{ Form::close() }}}
