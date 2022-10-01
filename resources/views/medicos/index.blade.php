@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Clientes</h1>
    <div class="alineado">
        <a href="{{route('qrvclientes.create')}}" class="btn btn-info">Nuevo Cliente</a>
    </div>
@stop

@section('content')
    <table class="table">
        <caption>Lista de usuarios</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Telefono</th>
                <th scope="col">Estatus</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Christian</td>
                <td>Vilcapoma</td>
                <td>974677444</td>
                <td>Activo</td>
                <td>
                    <a href="{{route('qrvclientes.create')}}"><i class="fa fa-edit"></i></a>

                    <i class="fa fa-trash"></i>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Yaquelin</td>
                <td>Jimenez</td>
                <td>92164878</td>
                <td>Activo</td>
                <td>
                    <a href="{{route('qrvclientes.create')}}"><i class="fa fa-edit"></i></a>

                    <i class="fa fa-trash"></i>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Samir</td>
                <td>Poma</td>
                <td>948437583</td>
                <td>Activo</td>
                <td>
                    <a href="{{route('qrvclientes.create')}}"><i class="fa fa-edit"></i></a>

                    <i class="fa fa-trash"></i>
                </td>
            </tr>

        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop