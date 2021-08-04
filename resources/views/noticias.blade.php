@extends ('layouts/admin')

@section ('content')

    <div class="title-section">NOTICIAS</div>

    <a href="/adminzk/noticias/crear">
        <button type="button" class="btn btn-success mb-3 mt-3">Crear Noticia</button>
    </a>
    <table class="table table-borderless table-dark" style="vertical-align: middle">
        <thead>
            <tr class="table-active">
                <th>Portada</th>
                <th>Título</th>
                <th>Fecha</th>
                <th>Autor/a</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $noticia)
                <tr class="table-active">
                    <td>
                        <img style="max-width: 100px; max-height: 100px" src="{{ $noticia['image'] }} " alt="">
                    </td>
                    <td>{{ $noticia['title'] }} </td>
                    <td>{{ $noticia['date'] }} </td>
                    <td>{{ $noticia['name'] }} </td>
                    <td> 
                        <div style="display: flex; ">
                            <a href="/adminzk/noticias/editar/{{ $noticia['id'] }}">
                                <button type="button" class="btn btn-info" style="margin-right: 10px">Editar</button>
                            </a>
                            <form action="/api/v1/noticias/{{ $noticia['id'] }}" method="POST">
                                {{ method_field('DELETE') }}

                                <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">

                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

