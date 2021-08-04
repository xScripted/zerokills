<?php
// php artisan storage:link

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Api\V1\OverviewController;

class NoticiasController extends Controller
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
    public function index() {

        $noticias = Noticia::join('users', 'noticias.user_id', '=', 'users.id') 
                        ->orderBy('date', 'desc')
                        ->get(['noticias.*', 'users.name']);
                       

        return response($noticias);
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
            'portada' => 'required',
            'description' => 'required|max:10000',
        ]);

        $imagen = $request->file('portada')->store('public/images/noticias');

        $imagen = Storage::url($imagen);

        $noticia = new Noticia();
        $noticia->title = $request->title;
        $noticia->description = $request->description;
        $noticia->image = $imagen;
        $noticia->user_id = $request->user_id;
        $noticia->date = $request->date;
        $noticia->save();

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $request->title,
            'category' => 'Noticias',
            'method' => 'Crear',
            'user_id' => $request->user_id,
        ]);

        return redirect('/adminzk/noticias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:10000',
        ]);

        if(!empty($request->file('portada'))) {
            $imagen = $request->file('portada')->store('public/images/noticias');
            $imagen = Storage::url($imagen);
        } else {
            $imagen = $noticia->image;
        }

        Noticia::whereId($request->noticia_id)->update([
            'title' => $request->title,
            'image' => $imagen,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $request->title,
            'category' => 'Noticias',
            'method' => 'Actualizar',
            'user_id' => $request->user_id,
        ]);

        return redirect('/adminzk/noticias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia) {
        Noticia::destroy($noticia->id);

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $noticia->title,
            'category' => 'Noticias',
            'method' => 'Borrar',
            'user_id' => $noticia->user_id,
        ]);

        return redirect('/adminzk/noticias');
    }
}