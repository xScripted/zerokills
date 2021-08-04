@php
if (!$dbData) {
    $dbData = new stdClass();
    $dbData->image = '/img/default-player.jpg';
    $dbData->nickname = '';
    $dbData->tag = '';
    $dbData->subtitle = '';
    $dbData->range = '';
    $dbData->team = '';
} 

$GLOBALS['dbData'] = $dbData;


$urlroot = "https://media.valorant-api.com/competitivetiers";
$ranges = [
    'Radiante' => $urlroot.'/564d8e28-c226-3180-6285-e48a390db8b1/24/smallicon.png',
    'Inmortal_3' => $urlroot.'/564d8e28-c226-3180-6285-e48a390db8b1/23/smallicon.png',
    'Inmortal_2' => $urlroot.'/564d8e28-c226-3180-6285-e48a390db8b1/22/smallicon.png',
    'Inmortal_1' => $urlroot.'/564d8e28-c226-3180-6285-e48a390db8b1/21/smallicon.png',
    'Diamante_3' => $urlroot.'/564d8e28-c226-3180-6285-e48a390db8b1/20/smallicon.png',
    'Diamante_2' => $urlroot.'/23eb970e-6408-bc0b-3f20-d8fb0e0354ea/19/smallicon.png',
    'Diamante_1' => $urlroot.'/23eb970e-6408-bc0b-3f20-d8fb0e0354ea/18/smallicon.png',
    'Platino_3' => $urlroot.'/edb72a72-7e6d-6010-9591-7c053bbdbf48/17/smallicon.png',
    'Platino_2' => $urlroot.'/edb72a72-7e6d-6010-9591-7c053bbdbf48/16/smallicon.png',
    'Platino_1' => $urlroot.'/23eb970e-6408-bc0b-3f20-d8fb0e0354ea/15/smallicon.png',
    'Oro_3' => $urlroot.'/564d8e28-c226-3180-6285-e48a390db8b1/14/smallicon.png',
    'Oro_2' => $urlroot.'/edb72a72-7e6d-6010-9591-7c053bbdbf48/13/smallicon.png',
    'Oro_1' => $urlroot.'/564d8e28-c226-3180-6285-e48a390db8b1/12/smallicon.png',
    'Plata_3' => $urlroot.'/23eb970e-6408-bc0b-3f20-d8fb0e0354ea/11/smallicon.png',
    'Plata_2' => $urlroot.'/564d8e28-c226-3180-6285-e48a390db8b1/10/smallicon.png',
    'Plata_1' => $urlroot.'/23eb970e-6408-bc0b-3f20-d8fb0e0354ea/9/smallicon.png',
    'Bronce_3' => $urlroot.'/564d8e28-c226-3180-6285-e48a390db8b1/8/smallicon.png',
    'Bronce_2' => $urlroot.'/23eb970e-6408-bc0b-3f20-d8fb0e0354ea/7/smallicon.png',
    'Bronce_1' => $urlroot.'/564d8e28-c226-3180-6285-e48a390db8b1/6/smallicon.png',
];

$GLOBALS['ranges'] = $ranges;

function selcRange($name) {

    return $GLOBALS['dbData']->range == $GLOBALS['ranges'][$name] ? 'selected' : '';
}


@endphp

<form action="/api/v1/jugadores/{{ $typeId }}" method="POST" enctype="multipart/form-data">
{{ method_field($method) }}
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-7">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag">Nombre</span>
                    <input type="text" class="form-control" name="nickname" value="{{ $dbData->nickname }}">
                </div> 
            </div>
            <div class="col-md-5">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag">Tag</span>
                    <input type="text" class="form-control" name="tag" value="{{ $dbData->tag }}">
                </div> 
            </div>
            <div class="col-md-7">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag">Subtítulo</span>
                    <input type="text" class="form-control" name="subtitle" value="{{ $dbData->subtitle }}">
                </div> 
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag"> Rango</span>
                    <select class="form-select" name="range">
                        <option {{ selcRange('Radiante') }} value="{{ $ranges['Radiante'] }}"> Radiante </option>
                        <option {{ selcRange('Inmortal_3') }} value="{{ $ranges['Inmortal_3'] }}"> Inmortal </option>
                        <option {{ selcRange('Diamante_3') }} value="{{ $ranges['Diamante_3'] }}"> Diamante 3 </option>
                        <option {{ selcRange('Diamante_2') }} value="{{ $ranges['Diamante_2'] }}"> Diamante 2 </option>
                        <option {{ selcRange('Diamante_1') }} value="{{ $ranges['Diamante_1'] }}"> Diamante 1 </option>
                        <option {{ selcRange('Platino_3') }} value="{{ $ranges['Platino_3'] }}"> Platino 3 </option>
                        <option {{ selcRange('Platino_2') }} value="{{ $ranges['Platino_2'] }}"> Platino 2 </option>
                        <option {{ selcRange('Platino_1') }} value="{{ $ranges['Platino_1'] }}"> Platino 1 </option>
                        <option {{ selcRange('Oro_3') }} value="{{ $ranges['Oro_3'] }}"> Oro 3 </option>
                        <option {{ selcRange('Oro_2') }} value="{{ $ranges['Oro_2'] }}"> Oro 2 </option>
                        <option {{ selcRange('Oro_1') }} value="{{ $ranges['Oro_1'] }}"> Oro 1 </option>
                        <option {{ selcRange('Plata_3') }} value="{{ $ranges['Plata_3'] }}"> Plata 3 </option>
                        <option {{ selcRange('Plata_2') }} value="{{ $ranges['Plata_2'] }}"> Plata 2 </option>
                        <option {{ selcRange('Plata_1') }} value="{{ $ranges['Plata_1'] }}"> Plata 1 </option>
                        <option {{ selcRange('Bronce_3') }} value="{{ $ranges['Bronce_3'] }}"> Bronce 3 </option>
                        <option {{ selcRange('Bronce_2') }} value="{{ $ranges['Bronce_2'] }}"> Bronce 2 </option>
                        <option {{ selcRange('Bronce_1') }} value="{{ $ranges['Bronce_1'] }}"> Bronce 1 </option>
                    </select>
                </div> 
            </div>
            <div class="col-md-5">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text form-label-tag">Equipo</span>
                    <select class="form-select" name="team" aria-label="Default select example">
                        <option {{ $dbData->team == 'Primer equipo' ? 'selected' : '' }} value="Primer equipo">ZK1 Valorant</option>
                        <option {{ $dbData->team == 'Segundo equipo' ? 'selected' : '' }} value="Segundo equipo">ZK2 Valorant</option>
                    </select>
                </div> 
            </div>
        </div>        
    </div>
    <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="jugador_id" value="{{ $typeId}}">
    <div class="col-md-4">
        <div class="container-image">
            <div class="jugador-image m-3" style="background-image: url(' {{ $dbData->image }} ')"> </div>            
        </div>

        <input type="file" class="m-3" name="image" onchange="readURL(this, '.jugador-image');">

        <button type="submit" class="btn btn-primary m-3">{{ $submitBtn }}</button>
    </div>
    
</div>

</form>