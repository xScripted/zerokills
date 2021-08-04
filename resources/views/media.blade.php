@extends ('layouts/admin')

@section ('content')

    <div class="title-section">MEDIA</div>

    <a href="/adminzk/media/crear">
        <button type="button" class="btn btn-success mb-3 mt-3">Crear Media</button>
    </a>
    <table class="table table-borderless table-dark" style="vertical-align: middle">
        <thead>
            <tr class="table-active">
                <th>Media</th>
                <th>Texto</th>
                <th>Fecha</th>
                <th>Autor/a</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $med)
                <tr class="table-active">
                    <td>
                        <video width="320" height="240" controls>
                            <source src="{{ $med['url'] }}" type="video/mp4">
                        </video>
                    </td>
                    <td>{{ $med['text'] }} </td>
                    <td>{{ $med['date'] }} </td>
                    <td>{{ $med['name'] }} </td>
                    <td> 
                        <div style="display: flex; ">
                            <a href="/adminzk/media/editar/{{ $med['id'] }}">
                                <button type="button" class="btn btn-info" style="margin-right: 10px">Editar</button>
                            </a>
                            <form action="/api/v1/media/{{ $med['id'] }}" method="POST">
                                {{ method_field('DELETE') }}

                                <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">
                                <input type="hidden" name="id" value="{{ $med['id'] }}">

                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

