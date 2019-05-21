@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Libros'],
            ['route' => '', 'name' => 'Reservar Libro'],
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
                    <center><h5>RESERVAR LIBRO</h5></center>
                    <br><br>
                    <form action="{{route('pelicula.reservar')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$libro->id}}" name="id">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card" style="width: 20rem; padding-left: 20px; padding-top: 30px">
                                    <img class="card-img-top" style="width: 93% !important; height: 430px"
                                         src="{{asset($libro->url_caratula)}}"
                                         alt="Card image cap">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="width: 20rem;  padding-top: 10px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <center>
                                                    <h3 class="card-title"><b>{{$libro->nombre}}</b></h3>
                                                </center>
                                            </div>
                                        </div>
                                        <p class="card-text text-justify">{{$libro->descripcion}}</p>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><b>Disponibles</b> <label
                                                    class="badge badge-success">{{$libro->cantidad}}</label></li>
                                            <li class="list-group-item"><b>Autor: </b> {{$libro->director}}</li>
                                            <li class="list-group-item"><b>Editorial: </b> {{$libro->editorial}}</li>
                                            <li class="list-group-item"><b>Genero: </b> {{$libro->genero}}</li>
                                            <li class="list-group-item" style="padding: 0">
                                                <form action="{{route('pelicula.reservarIndex', $libro->id)}}">
                                                    <button class="btn btn-block btn-outline-info"
                                                            style="margin-bottom: 10px;margin-top: 10px;">Reservar
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="width: 20rem;  padding-top: 10px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <center>
                                                    <h3 class="card-title"><b>Datos del estudiante</b></h3>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <style>
                                            .foc{
                                                border: none;
                                            }
                                            .foc:focus{
                                                border: #17b3f3 1px solid !important;
                                            }
                                        </style>
                                        <input style="margin-bottom: 6px !important;" required placeholder="NoCarnet.." type="number" min="0" class="foc form-control" name="nocarnet">
                                        <input style="margin-bottom: 6px !important;" required placeholder="Nombre.." class="foc form-control" name="name">
                                        <input style="margin-bottom: 6px !important;" required placeholder="Apellido.." class="foc form-control" name="lastName">
                                        <input style="margin-bottom: 6px !important;" required placeholder="Direccion.." class="foc form-control" name="direction">
                                        <input style="margin-bottom: 6px !important;" required placeholder="Telefono.." type="number" min="0" class="foc form-control" name="phone">
                                        <input style="margin-bottom: 6px !important;" required placeholder="Email.." type="email" class="foc form-control" name="email">
                                        <input required placeholder="Hooby.." name="hooby" class="foc form-control">
                                        <select style="margin-bottom: 6px !important;" class="foc form-control" name="gender">
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                        <select style="margin-bottom: 6px !important;" class="form-control foc" name="department">
                                            <option value="Amazonas">Amazonas</option>
                                            <option value="Antioquia">Antioquia</option>
                                            <option value="Arauca">Arauca</option>
                                            <option value="Atlántico">Atlántico</option>
                                            <option value="Bolívar">Bolívar</option>
                                            <option value="Boyacá">Boyacá</option>
                                            <option value="Caldas">Caldas</option>
                                            <option value="Caquetá">Caquetá</option>
                                            <option value="Casanare">Casanare</option>
                                            <option value="Cauca">Cauca</option>
                                            <option value="Cesar">Cesar</option>
                                            <option value="Chocó">Chocó</option>
                                            <option value="Córdoba">Córdoba</option>
                                            <option value="Cundinamarca">Cundinamarca</option>
                                            <option value="Guainía">Guainía</option>
                                            <option value="Guaviare">Guaviare</option>
                                            <option value="Huila">Huila</option>
                                            <option value="LaGuajira">LaGuajira</option>
                                            <option value="Magdalena">Magdalena</option>
                                            <option value="Meta">Meta</option>
                                            <option value="Nariño">Nariño</option>
                                            <option value="NortedeSantander">Norte de Santander</option>
                                            <option value="Putumayo">Putumayo</option>
                                            <option value="Quindío">Quindío</option>
                                            <option value="Risaralda">Risaralda</option>
                                            <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                                            <option value="Santander">Santander</option>
                                            <option value="Sucre">Sucre</option>
                                            <option value="Tolima">Tolima</option>
                                            <option value="Valle del Cauca">Valle del Cauca</option>
                                            <option value="Vaupés">Vaupés</option>
                                            <option value="Vichada">Vichada</option>
                                        </select>
                                        <select style="margin-bottom: 6px !important;" class="foc form-control" name="city">
                                            <option>Leticia</option>
                                            <option>Medellín</option>
                                            <option>Arauca</option>
                                            <option>Barranquilla</option>
                                            <option>Cartagena de Indias</option>
                                            <option>Tunja</option>
                                            <option>Manizales</option>
                                            <option>Florencia</option>
                                            <option>Yopal</option>
                                            <option>Popayán</option>
                                            <option>Valledupar</option>
                                            <option>Quibdó</option>
                                            <option>Montería</option>
                                            <option>Bogotá</option>
                                            <option>Inírida</option>
                                            <option>San José del Guaviare</option>
                                            <option>Neiva</option>
                                            <option>Riohacha</option>
                                            <option>Santa Marta</option>
                                            <option>Villavicencio</option>
                                            <option>Pasto</option>
                                            <option>San José de Cúcuta</option>
                                            <option>Mocoa</option>
                                            <option>Armenia</option>
                                            <option>Pereira</option>
                                            <option>San Andrés</option>
                                            <option>Bucaramanga</option>
                                            <option>Sincelejo</option>
                                            <option>Ibagué</option>
                                            <option>Cali</option>
                                            <option>Mitú</option>
                                            <option>Puerto Carreño</option>
                                        </select>
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
