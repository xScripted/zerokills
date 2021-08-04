<?php
// php artisan storage:link

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Api\V1\OverviewController;

class BannersController extends Controller
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
        $banner = Banner::join('users', 'banners.user_id', '=', 'users.id')
                        ->get(['banners.*', 'users.name']);
       

        return response($banner);
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

        if(is_null($request->active)) {
            $request->active = 'off';
        }

        $banner = new Banner();
        
        $banner->text = $request->text;
        $banner->active = $request->active;
        $banner->user_id = $request->user_id;

        $banner->save();

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $request->text,
            'category' => 'Banner',
            'method' => 'Crear',
            'user_id' => $request->user_id,
        ]);

        return redirect('/adminzk/banners');
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

        if(is_null($request->active)) {
            $request->active = 'off';
        }

        Banner::whereId($request->banner_id)->update([
            'text' => $request->text,
            'active' => $request->active,
        ]);

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $request->text,
            'category' => 'Jugador',
            'method' => 'Actualizar',
            'user_id' => $request->user_id,
        ]);

        return redirect('/adminzk/banners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $banner = Banner::findorFail($request->id);
        Banner::destroy($request->id);

        $overview = new OverviewController();
        $overview->registerOverview([
            'title' => $banner->text,
            'category' => 'Banner',
            'method' => 'Borrar',
            'user_id' => $banner->user_id,
        ]);

        return redirect('/adminzk/banners');
    }
}
