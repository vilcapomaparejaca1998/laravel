@section('contenido')  
    <div class="container py-5 text-center"> 
        @if (isset($client))       {{-- isset indica si existe o no la variable $client --}}
        <h1>Editar Cliente</h1>  
        @else
        <h1>Crear Cliente</h1>    
        @endif
      
        @if (isset($client))
        <form action="{{route('qrvclientes.update',$client)}}" method="post"> {{-- put o path al no ser reconocido posiblemente por el navegador se reemplaza por put en laravel mediante @method('PUT') --}}
            @method('PUT')
        @else
        <form action="{{route('qrvclientes.store')}}" method="POST">           
        @endif
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" placeholder="Nombre del Cliente" value="{{old('name')?? @$client->name}}">
            <p class="form-text">Escribe el nombre del cliente</p>
            @error('name')
                <p class="text-danger form-text">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="due" class="form-label">Saldo</label>
            <input type="number" class="form-control" name="due" placeholder="Saldo del Cliente" step="0.01" value="{{old('due')?? @$client->due}}">
            <p class="form-text">Escribe el saldo del cliente</p>
            @error('due')
                <p class="text-danger form-text">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="comments" class="form-label">Comentarios</label>
            <textarea name="comments" cols="30" rows="4" class="form-control">{{old('comments') ?? @$client->comments}}</textarea>
            <p class="form-text">Escribe los comentarios del cliente</p>
            @error('comments')
                <p class="text-danger form-text">{{ $message }}</p>
            @enderror
        </div>
        @if (isset($client))
        <button type="submit" class="btn btn-info">Editar Cliente</button>  
        @else
        <button type="submit" class="btn btn-info">Guardar Cliente</button>   
        @endif
        
      </form>
    </div>  
@endsection