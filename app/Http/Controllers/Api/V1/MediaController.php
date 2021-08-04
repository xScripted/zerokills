<?php
// php artisan storage:link

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Api\V1\OverviewController;

class MediaController extends Controller
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
        $media = Media::join('users', 'media.user_id', '=', 'users.id') 
                        ->orderBy('date', 'desc')
                        ->get(['Media.*', 'users.name']);
       

        return response($media);
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
            'url' => 'required|max:100',
            'date' => 'required',
        ]);

        $media = new Media();
        
        $media->text = $request->text;
        $media->url = $request->url;
        $media->date = $request->date;
        $media->user_id = $request->user_id;

        $media->save();

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $request->text,
            'category' => 'Media',
            'method' => 'Crear',
            'user_id' => $request->user_id,
        ]);

        return redirect('/adminzk/media');
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
            'url' => 'required|max:100',
            'date' => 'required',
        ]);


        Media::whereId($request->media_id)->update([
            'text' => $request->text,
            'url' => $request->url,
            'date' => $request->date,
        ]);

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $request->text,
            'category' => 'Media',
            'method' => 'Actualizar',
            'user_id' => $request->user_id,
        ]);

        return redirect('/adminzk/media');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        Media::destroy($request->id);

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $request->text,
            'category' => 'Media',
            'method' => 'Borrar',
            'user_id' => $request->user_id,
        ]);

        return redirect('/adminzk/media');
    }
}
