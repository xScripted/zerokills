<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Models\Overview;

class AdminHomeController extends Controller
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
    public function index() {
        $overviews = Overview::join('users', 'overview.user_id', '=', 'users.id')
                        ->orderBy('users.created_at', 'desc') //->paginate(5)->only
                        ->get(['overview.*', 'users.name']);

        $overviews = json_decode(response($overviews)->content());

        return view('adminhome', ['overviews' => $overviews]);
    }

    public function admin_to_view() {

        $type = Route::currentRouteName();

        $data = Http::get(env('APP_URL').'/api/v1/'.$type)->json();

        return view($type, ['data' => $data]);
    }

}
