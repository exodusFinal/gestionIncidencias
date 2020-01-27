@extends('master')
@section('content')
    <?php
    $faker = Faker\Factory::create();
    session_start();
    ?>

    <h1 class="h2 mb-3 font-weight-normal" style="text-align: center">Incidencia</h1>
    <div class="d-flex justify-content-center align-items-center">
        <div class="d-flex justify-content-center align-items-center card login bg-light w-75">

            <form class="form-signin w-85" action="/anadir" method="get">
                <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Mapa de la incidencia</h2>
                <div id="map"></div>
                <script>
                    let map = L.map('map').setView([42.866924, -2.676800], 8);

                    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TALcQipMfxgGJSNPScri', {
                        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',

                    }).addTo(map);



                    let popup = L.popup();

                    function onMapClick(e) {
                        popup
                            .setLatLng(e.latlng)
                            .setContent(e.latlng.lat.toString() + ", " +  e.latlng.lng.toString())
                            .openOn(map);

                            let localizacion = localizacion.setContent(e.latlng.lat.toString() + ", " +  e.latlng.lng.toString());
                            document.getElementById('localizacion').value = localizacion;
                    }

                    map.on('click', onMapClick);

                </script>

                <input type="hidden" id="localizacion" name="localizacion">

                <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Operador</h2>
                <label>Operador</label>
                <input class="form-control" type="text" name="id_operador" value="{{$_SESSION['nombre']}}" disabled>
                <input type="hidden" name="id_operador" value="{{$_SESSION['id']}}">
                <input type="hidden" name="fechainicio" value="">
                <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Cliente</h2>
                <label>Cliente</label>
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="nombrecliente" placeholder="Nombre" autofocus
                               required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="apellidos" placeholder="Apellidos" required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="number" name="edad" placeholder="Edad" required>
                    </div>

                    <div class="col-md-6">
                        <label>DNI</label>
                        <input class="form-control" type="text" name="dni" placeholder="DNI" required>
                    </div>
                    <div class="col-md-6">
                        <label>Telefono</label>
                        <input class="form-control" type="text" name="telefono" placeholder="Telefono" required>
                    </div>
                </div>
                <label>Direccion</label>
                <input class="form-control" type="text" name="direccion" placeholder="Direccion" required>

                <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Vehiculo</h2>

                <div class="row">
                    <div class="col-md-6">
                        <label>Matricula</label>
                        <input class="form-control" type="text" name="matricula" placeholder="Matricula" required>
                    </div>
                    <div class="col-md-6">
                        <label>Marca</label>
                        <input class="form-control" type="text" name="marca" placeholder="Marca" required>
                    </div>
                    <div class="col-md-6">
                        <label>Modelo</label>
                        <input class="form-control" type="text" name="modelo" placeholder="Modelo" required>
                    </div>
                    <div class="col-md-6">
                        <label>Tipo</label>
                        <select name="tipo" class="form-control">
                            <option value="pinchazo" name="tipo">Pinchazo</option>
                            <option value="motor" name="tipo">Motor</option>
                            <option value="bateria" name="tipo">Bateria</option>
                            <option value="golpe" name="tipo">Golpe</option>
                            <option value="otros" name="tipo">Otros</option>
                        </select>
                    </div>
                </div>
                <label>Descripcion</label>
                <textarea class="form-control" type="text" name="descripcion"
                          placeholder="Descripcion de la incidencia"
                          required></textarea>


                <label>Tecnico</label>


                <select name="id_tecnico" class="form-control">
                    @foreach($tecnicos as $tecnico)
                        <option value="{{$tecnico->id_persona}}" name="id_tecnico">{{$tecnico->id_persona}}</option>
                    @endforeach
                </select>


                <label>Observaciones</label>
                <textarea class="form-control" type="text" name="observacion" placeholder="Observaciones"
                          required></textarea>
                <br>
                <input type="hidden" name="accion" value="insertar">
                <input type="submit" class="btn btn-primary" value="Añadir">
            </form>
        </div>
    </div>

@endsection
