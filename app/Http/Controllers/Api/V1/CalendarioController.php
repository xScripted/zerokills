<?php
// php artisan storage:link

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Calendario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Api\V1\OverviewController;

class CalendarioController extends Controller
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
        $calendario = Calendario::join('users', 'calendario.user_id', '=', 'users.id') 
                        ->orderBy('date', 'desc')
                        ->get(['calendario.*', 'users.name']);
       

        return response($calendario);
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
            'title' => 'required|max:100',
            'type' => 'required',
        ]);

        $calendario = new Calendario();
        
        $calendario->title = $request->title;
        $calendario->type = $request->type;
        $calendario->t1name = $request->t1name;
        $calendario->t1score = $request->t1score;
        $calendario->t2name = $request->t2name;
        $calendario->t2score = $request->t2score;
        $calendario->stream = $request->stream;
        $calendario->date = $request->date;
        $calendario->hour = $request->hour;
        $calendario->user_id = $request->user_id;

        if(!is_null($request->t1logo)) $calendario->t1logo = $request->t1logo;
        if(!is_null($request->t2logo)) $calendario->t2logo = $request->t2logo;


        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $request->title,
            'category' => 'Calendario',
            'method' => 'Crear',
            'user_id' => $request->user_id,
        ]);

        $calendario->save();

        return redirect('/adminzk/calendario');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'type' => 'required',
        ]);

        if(!empty($request->file('image'))) {
            $imagen = $request->file('image')->store('public/images/calendario');
            $imagen = Storage::url($imagen);
        } else {
            $imagen = '/img/default-player.jpg';
        }

        Calendario::whereId($request->calendario_id)->update([
            'title' => $request->title,
            'type' => $request->type,
            't1name' => $request->t1name,
            't1score' => $request->t1score,
            't1logo' => $request->t1logo,
            't2name' => $request->t2name,
            't2score' => $request->t2score,
            't2logo' => $request->t2logo,
            'stream' => $request->stream,
            'date' => $request->date,
            'hour' => $request->hour,
            'user_id' => $request->user_id,
        ]);

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $request->title,
            'category' => 'Calendario',
            'method' => 'Actualizar',
            'user_id' => $request->user_id,
        ]);

        return redirect('/adminzk/calendario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $calendario = Calendario::findorFail($request->id);
        Calendario::destroy($request->id);

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $calendario->title,
            'category' => 'Calendario',
            'method' => 'Borrar',
            'user_id' => $calendario->user_id,
        ]);

        return redirect('/adminzk/calendario');
    }
}
