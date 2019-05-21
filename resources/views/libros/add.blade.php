@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Agregar Libros']
        ],
        'show_add_button' => false,
        'add_button_route' => route('home')
    ])
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <center><h5>Agregar Libros</h5></center>
                    <br><br>
                    <form id="form" method="post" action="{{route('pelicula.agregar')}}"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label>Nombre</label>
                                <input name="nombre" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Descripcion</label>
                                <textarea name="descripcion" row="4" class="form-control" required></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Autor</label>
                                <input name="director" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <label>Genero</label>
                                <select class="form-control" name="genero">
                                    <option value="Accion">Accion</option>
                                    <option value="Fantasia">Fantasia</option>
                                    <option value="Accion">Edad Medieval</option>
                                    <option value="Medieval">Ciencia Ficción</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Documental">Documental</option>
                                    <option value="Romantico">Romantica</option>
                                    <option value="Comedia">Comedia</option>
                                    <option value="Terror">Terror</option>
                                    <option value="Familiar">Familiar</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Editorial</label>
                                <input type="text" name="editorial" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label>Cantidad</label>
                                <input type="number" name="cantidad" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <label>Caratula</label>
                                <input type="file" class="form-control" name="file" required>
                            </div>
                        </div>
                        <br>
                        <center>
                            <button class="btn btn-outline-success">Guardar</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
