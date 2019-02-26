<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Bien Pensado') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">  

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-primary">
            <span class="navbar-brand mb-0 h1">Bien Pensado</span>
        </nav>
        
        <div class="container">
            <div class="row mt-5">
                <div class="col-6">
                    <input type="text" v-model="search" class="form-control" placeholder="Buscar">
                </div>

                <div class="col-6">
                    <button type="button" class="btn btn-primary btn-md float-right">Crear producto</button>
                </div>
            </div>
            

            <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Bodega</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Gestion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="producto in productos">
                    <th v-text="producto.nombre"></th>
                    <td v-text="producto.bodega.nombre"></td>
                    <th v-text="producto.nombre"></th>
                    <th> <button class="btn" :class="producto.estado ? 'btn-success' : 'btn-danger'" v-text="producto.estado ? 'Activo' : 'Inactivo'"></button> </th>
                    <th> <button type="button" class="btn btn-primary" @click="cambiarEstado(producto.id)">Cambiar estado</button> </th>
                </tr>
            </tbody>
            </table>
        </div> 
    </div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
