<?php
// php artisan storage:link

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\V1\OverviewController;
use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JugadoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores = Jugador::join('users', 'jugadores.user_id', '=', 'users.id') 
                        ->orderBy('team', 'asc')
                        ->get(['jugadores.*', 'users.name']);
       

        return response($jugadores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nickname' => 'required|max:100',
            'tag' => 'required',
        ]);

        if(!empty($request->file('image'))) {
            $imagen = $request->file('image')->store('public/images/jugadores');
            $imagen = Storage::url($imagen);
        } else {
            $imagen = '/img/default-player.jpg';
        }

        $jugador = new Jugador();
        $jugador->nickname = $request->nickname;
        $jugador->tag = $request->tag;
        $jugador->image = $imagen;
        $jugador->user_id = $request->user_id;
        $jugador->subtitle = $request->subtitle;
        $jugador->range = $request->range;
        $jugador->team = $request->team;
        $jugador->save();

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $request->nickname,
            'category' => 'Jugador',
            'method' => 'Crear',
            'user_id' => $request->user_id,
        ]);

        return redirect('/adminzk/jugadores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nickname' => 'required|max:100',
            'tag' => 'required',
        ]);

        $updateData = [
            'nickname' => $request->nickname,
            'team' => $request->team,
            'tag' => $request->tag,
            'range' => $request->range,
            'subtitle' => $request->subtitle,
        ];

        if(!empty($request->file('image'))) {
            $imagen = $request->file('image')->store('public/images/jugadores');
            $imagen = Storage::url($imagen);

            $updateData['image'] = $imagen;
        }

        Jugador::whereId($request->jugador_id)->update($updateData);

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $request->nickname,
            'category' => 'Jugador',
            'method' => 'Actualizar',
            'user_id' => $request->user_id,
        ]);

        return redirect('/adminzk/jugadores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $jugador = Jugador::findorFail($request->id);
        Jugador::destroy($request->id);

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $jugador->nickname,
            'category' => 'Jugador',
            'method' => 'Borrar',
            'user_id' => $jugador->user_id,
        ]);

        return redirect('/adminzk/jugadores');
    }
}
