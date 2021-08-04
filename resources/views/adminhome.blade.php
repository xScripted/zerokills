@extends ('layouts/admin')

@section ('content')

  <div class="title-section">🛠 Panel de administracion 🛠 </div>

  <table class="table table-borderless table-dark mt-5" style="vertical-align: middle">
    <thead>
      <tr class="table-active">
          <th>Título</th>
          <th>Categoria</th>
          <th>Acción</th>
          <th>Autor/a</th>          
          <th>Fecha</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($overviews as $overview)
        <tr style="height: 70px; vertical-align: middle">
          <td> {{ $overview->title }} </td>
          <td> {{ $overview->category }} </td>
          <td> {{ $overview->method }} </td>
          <td> {{ $overview->name }} </td>
          <td> {{ $overview->created_at }} </td>
        </tr>
      @endforeach
    </tbody>
</table>

@stop