@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Libros'],
            ['route' => '', 'name' => 'Devolver']
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
                    <center><h5>DEVOLVER LIBROS</h5></center>
                    <br><br>
                    <form action="{{route('pelicula')}}">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title mb-0">Libros Prestados</h2>
                                        <br>
                                        <div class="row">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Autor</th>
                                                    <th scope="col">Editorial</th>
                                                    <th scope="col">Genero</th>
                                                    <th scope="col">Estudiante</th>
                                                    <th style="text-align: center" scope="col">Option</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($loans as $loan)
                                                    <tr>
                                                        <th scope="row">{{$loan->id_reserva}}</th>
                                                        <td>{{$loan->nombre}}</td>
                                                        <td>{{$loan->director}}</td>
                                                        <td>{{$loan->editorial}}</td>
                                                        <td>{{$loan->genero}}</td>
                                                        <td>{{$loan->student}}</td>
                                                        <td style="text-align: center">
                                                            <form action="{{route('book.back', $loan->id_reserva)}}">
                                                                <button class="btn btn-outline-success">Devolver <i class="fa fa-undo-alt"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
