@php
if (!$dbData) {
    $dbData = new stdClass();
    $dbData->image = '/img/default-placeholder.png';
    $dbData->title = '';
    $dbData->date = date('Y') . '-' . date('m') . '-' . date('d');
    $dbData->description = '';
} 
@endphp

<form action="/api/v1/noticias/{{ $typeId }}" method="POST" enctype="multipart/form-data">
    {{ method_field($method) }}
    <div class="row">
        <div class="col-md-8">
            <div class="input-group mb-3 mt-3">
                <span class="input-group-text form-label-tag">Título</span>
                <input type="text" class="form-control" name="title" value="{{ $dbData->title }}">
            </div>  
            <div class="input-group">
                <span class="input-group-text form-label-tag">Contenido <br> HTML</span>
                <textarea class="form-control html-textarea" name="description" aria-label="With textarea">{{ $dbData->description }}</textarea>
            </div>           
        </div>
        <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="noticia_id" value="{{ $typeId }}">
        <div class="col-md-4">
            <div class="container-image">
                <div class="noticia-image m-3" style="background-image: url(' {{ $dbData->image }} ')"> </div>            
            </div>

            <input type="file" class="m-3" name="portada" onchange="readURL(this, '.noticia-image');">

            <input type="date" class="m-3" name="date" style="display: block" value="{{ $dbData->date }}">

            <button type="submit" class="btn btn-primary m-3">{{ $submitBtn }}</button>
        </div>
        
    </div>
</form>