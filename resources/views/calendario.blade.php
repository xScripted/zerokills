@extends ('layouts/admin')

@section ('content')

    <div class="title-section">CALENDARIO </div> 

    <a href="/adminzk/calendario/crear">
        <button type="button" class="btn btn-success mb-3 mt-3">Crear Evento</button>
    </a>
    <table class="table table-borderless table-dark" style="vertical-align: middle">
        <thead>
            <tr class="table-active">
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Autor/a</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $calendario)
                <tr class="table-active">
                    <td> {{ $calendario['title'] }} </td>
                    <td> {{ $calendario['date'] }} </td>
                    <td> {{ $calendario['hour'] }} </td>
                    <td> {{ $calendario['name'] }} </td>
                    <td> 
                        <div style="display: flex; ">
                            <a href="/adminzk/calendario/editar/{{ $calendario['id'] }}">
                                <button type="button" class="btn btn-info" style="margin-right: 10px">Editar</button>
                            </a>
                            <form action="/api/v1/calendario/{{ $calendario['id'] }}" method="POST">
                                {{ method_field('DELETE') }}

                                <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">
                                <input type="hidden" name="id" value="{{ $calendario['id'] }}">

                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

