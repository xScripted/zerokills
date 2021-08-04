@php
if (!$dbData) {
    $dbData = new stdClass();
    $dbData->text = '';
    $dbData->active = 'off';
    $dbData->url = '';
    $dbData->date = '';
} 
@endphp

<form action="/api/v1/banners/{{ $typeId }}" method="POST" enctype="multipart/form-data">
{{ method_field($method) }}
<div class="row">
    <div class="col-md-12">  
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" id="active" type="checkbox" name="active" {{ $dbData->active == 'on' ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Activar</label>
        </div>
    </div>
    <div class="col-md-9">  
        <div class="input-group">
            <span class="input-group-text form-label-tag">Texto</span>
            <textarea class="form-control" name="text"> {{ $dbData->text }} </textarea>
        </div>     
    </div>

    <div class="col-md-3">  
        <button type="submit" class="btn btn-primary m-3">{{ $submitBtn }}</button>      
    </div>

    <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="banner_id" value="{{ $typeId }}">
    
</div>
</form>