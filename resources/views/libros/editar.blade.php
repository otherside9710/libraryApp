@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Libros'],
            ['route' => '', 'name' => 'Editar']
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
                    <form method="POST" action="{{route('book.update')}}">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$book->id}}" class="form-control" name="id">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="card" style="width: 20rem; padding-left: 20px; padding-top: 30px">
                                    <img class="card-img-top" style="width: 93% !important; height: 430px"
                                         src="{{asset($book->url_caratula)}}"
                                         alt="Card image cap">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="width: 24rem; padding-left: 20px; padding-top: 30px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Titulo</label>
                                                <input required value="{{$book->nombre}}" class="form-control"
                                                       name="name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <label>Descripcion</label>
                                        <textarea required rows="10" class="form-control"
                                                  name="desc">{{preg_replace('/\s+/', '', trim($book->descripcion))}}</textarea>
                                        <br>
                                        <center>
                                            <button class="btn btn-outline-success">Actualizar</button>
                                        </center>
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
