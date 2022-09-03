@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>MEDICOS</h1>
@stop

@section('content')
<div class="container py-5 text-center">
    <h1>Listado de Medicos</h1>
    <a href="{{ route('qrvclientes.create') }}" class="btn btn-primary">Crear Cliente</a>
    @if (Session::has('mensaje'))
        <div class="alert alert-info my-5">
            {{ Session::get('mensaje') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Telefono Fijo</th>
            <th>Tipo de Documento</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @forelse ($clients as $detail)
                <tr>
                    <td>{{ $detail->name }}</td>
                    <td>{{ $detail->due }}</td>
                    <td>
                        <a href="{{ route('qrvclientes.edit', $detail) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('qrvclientes.destroy', $detail) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Estas seguro de eliminar este cliente')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">No hay registros</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if ($clients->count())
        {{ $clients->links() }}
    @else
    @endif

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

