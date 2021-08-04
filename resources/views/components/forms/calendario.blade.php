@php
if (!$dbData) {
    $dbData = new stdClass();
    $dbData->title = '';
    $dbData->date = date('Y') . '-' . date('m') . '-' . date('d');
    $dbData->hour = '';
    $dbData->stream = '';
    $dbData->team1 = '';
    $dbData->hour = '';
    $dbData->t1name = '';
    $dbData->t1logo = '';
    $dbData->t1score = '';
    $dbData->t2name = '';
    $dbData->t2logo = '';
    $dbData->t2score = '';
    $dbData->type = '';
} 
@endphp

<form action="/api/v1/calendario/{{ $typeId }}" method="POST" enctype="multipart/form-data">
{{ method_field($method) }}
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag">Título</span>
                    <input type="text" class="form-control" name="title" value="{{ $dbData->title }}">
                </div>  
            </div>
            <div class="col-md-3">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag">Tipo</span>
                    <select class="form-select" name="type">
                        <option value="partido" {{ $dbData->type == 'partido' ? 'selected' : '' }} > Partido </option>
                        <option value="titular" {{ $dbData->type == 'titular' ? 'selected' : '' }} > Titular </option>
                    </select>
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag">Equipo 1</span>
                    <input type="text" class="form-control" name="t1name" value="{{ $dbData->t1name }}">
                </div>  
            </div>
            <div class="col-md-5">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag">Logo URL</span>
                    <input type="text" class="form-control" name="t1logo" value="{{ $dbData->t1logo }}">
                </div>  
            </div>
            <div class="col-md-2">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag">Score</span>
                    <input type="text" class="form-control" name="t1score" value="{{ $dbData->t1score }}">
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag">Equipo 2</span>
                    <input type="text" class="form-control" name="t2name" value="{{ $dbData->t2name }}">
                </div>  
            </div>
            <div class="col-md-5">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag">Logo URL</span>
                    <input type="text" class="form-control" name="t2logo" value="{{ $dbData->t2logo }}">
                </div>  
            </div>
            <div class="col-md-2">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag">Score</span>
                    <input type="text" class="form-control" name="t2score" value="{{ $dbData->t2score }}">
                </div>  
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-group mb-3 mt-3">
                <span class="input-group-text form-label-tag">StreamURL</span>
                <input type="text" class="form-control" name="stream" value="{{ $dbData->stream }}">
            </div>  
        </div>
    </div>

    <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="calendario_id" value="{{ $typeId }}">

    <div class="col-md-4">

        <div class="input-group mb-3 mt-3">
            <span class="input-group-text form-label-tag">Fecha</span>
            <input type="date" name="date" style="display: block" value="{{ $dbData->date }}">
        </div> 
        <div class="input-group mb-3 mt-3">
            <span class="input-group-text form-label-tag">Hora</span>
            <input type="time" id="appt" name="hour" value="{{ $dbData->hour }}">
        </div> 
        <button type="submit" class="btn btn-primary mt-3 mb-3">{{ $submitBtn }} Evento</button>
    </div>
    
</div>

</form>
