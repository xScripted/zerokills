<?php
// php artisan storage:link

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Overview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class OverviewController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function registerOverview($data) {
        $overview = new Overview();

        $overview->title = $data['title'];
        $overview->category = $data['category'];
        $overview->method = $data['method'];
        $overview->user_id = $data['user_id'];

        $overview->save();
    }

}