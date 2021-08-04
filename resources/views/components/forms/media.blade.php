@php
if (!$dbData) {
    $dbData = new stdClass();
    $dbData->text = '';
    $dbData->url = '';
    $dbData->date = '';
    $dbData->type = '';
} 
@endphp

<form action="/api/v1/media/{{ $typeId }}" method="POST" enctype="multipart/form-data">
{{ method_field($method) }}
<div class="row">
    <div class="col-md-8">
        <div class="input-group mb-3 mt-3">
            <span class="input-group-text form-label-tag">Url</span>
            <input id="url_video" type="text" class="form-control" name="url" value="{{ $dbData->url }}">
        </div>  
        <div class="input-group">
            <span class="input-group-text form-label-tag">Texto</span>
            <textarea class="form-control html-textarea" name="text"> {{ $dbData->text }} </textarea>
        </div>           
    </div>
    <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="media_id" value="{{ $typeId }}">
    <div class="col-md-4">
        <div id="preview_video" class="container-video">
            <video width="320" height="240" controls>
                <source src="{{ $dbData->url }}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
        </div>  

        <input type="date" class="m-3" name="date" style="display: block" value="{{ date('Y') . '-' . date('m') . '-' . date('d') }}">

        <button type="submit" class="btn btn-primary m-3">{{ $submitBtn }}</button>
    </div>
    
</div>

</form>