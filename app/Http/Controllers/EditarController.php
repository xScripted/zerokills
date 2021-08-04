<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Models\Noticia;
use App\Models\Jugador;
use App\Models\Calendario;
use App\Models\Media;
use App\Models\Banner;


class EditarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin_create() {

        $type = Route::currentRouteName();

        return view('editar', ['type' => $type, 'method' => 'POST', 'typeId' => '', 'submitBtn' => 'Crear', 'dbData' => false]);
    }

    public function admin_edit(Request $request) {

        $type = Route::currentRouteName();

        $dbData = [];

        if($type == 'noticias') $dbData = Noticia::where('id', $request->typeId)->get();
        if($type == 'jugadores') $dbData = Jugador::where('id', $request->typeId)->get();
        if($type == 'calendario') $dbData = Calendario::where('id', $request->typeId)->get();
        if($type == 'media') $dbData = Media::where('id', $request->typeId)->get();
        if($type == 'banners') $dbData = Banner::where('id', $request->typeId)->get();


        return view('editar', 
                        [
                            'type' => $type, 
                            'method' => 'PUT', 
                            'typeId' => $request->typeId, 
                            'dbData' => $dbData[0],
                            'submitBtn' => 'Actualizar'
                        ]
                    );
    }

}
