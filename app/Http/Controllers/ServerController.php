<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServerController extends Controller
{
    public function index(Request $request)
    {
        $servers = Server::where('isActive', 1)->orderByRaw("status DESC, vote DESC")->paginate(5);

        $pagination = json_decode($servers->toJson(), true);

        return view('index', compact('servers'), compact('pagination'));

        /*
          <div class="ui warning message">
<i class="close icon"></i>
<div class="header">Actions Required</div>
<p>Please verify your email address in <strong>24 Hours</strong> or your account will get deleted. Check your email inbox/spambox for verification code.</p>
</div>

        */
    }
}