@extends ('layouts/admin')

@section ('content')

    <div class="title-section">JUGADORES</div> 

    <a href="/adminzk/jugadores/crear">
        <button type="button" class="btn btn-success mb-3 mt-3">Crear Jugador</button>
    </a>
    <table class="table table-borderless table-dark" style="vertical-align: middle">
        <thead>
            <tr class="table-active">
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Subtítulo</th>
                <th>Rango</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $jugador)
                <tr class="table-active">
                    <td>
                        <img style="max-width: 100px; max-height: 100px" src="{{ $jugador['image'] }} " alt="">
                    </td>
                    <td> {{ $jugador['nickname'] }} </td>
                    <td> {{ $jugador['team'] }} </td>
                    <td> {{ $jugador['subtitle'] }} </td>
                    <td> 
                        <img src="{{ $jugador['range'] }}" alt="">
                    </td>
                    <td> 
                        <div style="display: flex; ">
                            <a href="/adminzk/jugadores/editar/{{ $jugador['id'] }}">
                                <button type="button" class="btn btn-info" style="margin-right: 10px">Editar</button>
                            </a>
                            <form action="/api/v1/jugadores/{{ $jugador['id'] }}" method="POST">
                                {{ method_field('DELETE') }}

                                <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">
                                <input type="hidden" name="id" value="{{ $jugador['id'] }}">

                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

