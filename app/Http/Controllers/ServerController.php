<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index(Request $request)
    {
        $servers = Server::where('isActive', 1)->orderBy('rank')->paginate(3);
        $pagination = json_decode($servers->toJson(), true);

        return view('index', compact('servers'), compact('pagination'));
    }
}
