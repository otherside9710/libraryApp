@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Libros']
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
                    <center><h5>LIBROS</h5></center>
                    <br><br>
                    <form action="{{route('existencia')}}">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Libro</label>
                                <input name="search" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-success" style="margin-top: 30px">Buscar</button>
                            </div>
                            @if($flag)
                                <div class="col-md-2">
                                    <button class="btn btn-outline-info" style="margin-top: 30px">Volver</button>
                                </div>
                            @endif
                        </div>
                        <br>
                    </form>
                    <div class="row">
                        @foreach($books as $book)
                            <div class="card" style="width: 20rem; padding-left: 20px; padding-top: 30px">
                                <img class="card-img-top" height="440px" src="{{asset($book->url_caratula)}}"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title">{{$book->nombre}}</h5>
                                        </div>
                                    </div>
                                    <p class="card-text text-justify">{{$book->descripcion}}</p>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Disponibles</b> <label
                                                class="badge badge-success">{{$book->cantidad}}</label></li>
                                        <li class="list-group-item"><b>Autor: </b> {{$book->director}}</li>
                                        <li class="list-group-item"><b>Editorial: </b> {{$book->editorial}}</li>
                                        <li class="list-group-item"><b>Genero: </b> {{$book->genero}}</li>
                                        <li class="list-group-item" style="padding: 0">
                                            <form action="{{route('pelicula.reservarIndex', $book->id)}}">
                                                <button class="btn btn-block btn-outline-info"
                                                        style="margin-bottom: 10px;margin-top: 10px;">Reservar
                                                </button>
                                            </form>
                                        </li>
                                        <li class="list-group-item" style="padding: 0">
                                            <form action="{{route('pelicula.updateIndex',$book->id)}}">
                                                <button class="btn btn-block btn-outline-success"
                                                        style="margin-bottom: 10px;margin-top: 10px;">Editar
                                                </button>
                                            </form>
                                        </li>
                                        <li class="list-group-item" style="padding: 0">
                                            <form id="delForm{{$book->id}}" action="{{route('book.delete',$book->id)}}" method="POST">
                                                {{csrf_field()}}
                                                <button book="delForm{{$book->id}}" class="idDel btn btn-block btn-outline-danger"
                                                        style="margin-bottom: 10px;margin-top: 10px;">Eliminar
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
