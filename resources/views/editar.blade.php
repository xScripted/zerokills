@extends ('layouts/admin')

@section ('content')

    <style>
        .container-image {
            width: 100%;
            padding-top: 100%; /* 1:1 Aspect Ratio */
            position: relative; /* If you want text inside of it */
        }

        .noticia-image, .jugador-image {
            position:  absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            border-radius: 5px;
            box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 12%), 0 1px 5px 0 rgb(0 0 0 / 20%);
            background-image: url('/img/default-placeholder.png');
            background-size: cover;
            background-position: center;
        }

        .form-label-tag {
            width: 100px;
            justify-content: center;
        }

        .html-textarea {
            height: 530px;
        }
    </style>

    <div class="title-section"> {{ $submitBtn.' '.$type }}</div>

    @if ($type == 'noticias')
        <x-forms.noticias :typeId="$typeId" :dbData="$dbData" :submitBtn="$submitBtn" :method="$method"/>
    @endif

    @if ($type == 'jugadores')
        <x-forms.jugadores :typeId="$typeId" :dbData="$dbData" :submitBtn="$submitBtn" :method="$method"/>
    @endif

    @if ($type == 'calendario')
        <x-forms.calendario :typeId="$typeId" :dbData="$dbData" :submitBtn="$submitBtn" :method="$method"/>
    @endif

    @if ($type == 'media')
        <x-forms.media :typeId="$typeId" :dbData="$dbData" :submitBtn="$submitBtn" :method="$method"/>
    @endif

    @if ($type == 'banners')
        <x-forms.banners :typeId="$typeId" :dbData="$dbData" :submitBtn="$submitBtn" :method="$method"/>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script type="text/javascript">
        function readURL(input, preview) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    var previewDiv = document.querySelector(preview);
                    previewDiv.style.backgroundImage = 'url(' + e.target.result + ')'; 
                }
    
                reader.readAsDataURL(input.files[0]);
            }
        }

        var url = document.querySelector('#url_video');
        var preview_video = document.querySelector('#preview_video video source');

        function previewVideo() {
            preview_video.setAttribute('src', url.value);
        }

        previewVideo();

        url.addEventListener('input', () => previewVideo());

    </script>

@stop