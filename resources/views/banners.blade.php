@extends ('layouts/admin')

@section ('content')

    <div class="title-section">Banners</div>

    <a href="/adminzk/banners/crear">
        <button type="button" class="btn btn-success mb-3 mt-3">Crear Banner</button>
    </a>

    <table class="table table-borderless table-dark" style="vertical-align: middle">
        <thead>
            <tr class="table-active">
                <th>Texto</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $banner)
                <tr class="table-active">
                    <td> {{ $banner['text'] }} </td>
                    <td> {{ $banner['active'] == 'on' ? '✅' : '❌' }} </td>
                    <td> 
                        <div style="display: flex; ">
                            <a href="/adminzk/banners/editar/{{ $banner['id'] }}">
                                <button type="button" class="btn btn-info" style="margin-right: 10px">Editar</button>
                            </a>
                            <form action="/api/v1/banners/{{ $banner['id'] }}" method="POST">
                                {{ method_field('DELETE') }}

                                <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">
                                <input type="hidden" name="id" value="{{ $banner['id'] }}">

                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

