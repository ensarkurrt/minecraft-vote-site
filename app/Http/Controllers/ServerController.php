<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Rules\Password;

class ServerController extends Controller
{
    // TODO:: Types query from database
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

    public function show(Request $request, $id)
    {
        $server = Server::where('id', $id)->where('isActive', 1)->with('user')->get();
        if (count($server) == 0) {
            abort(404);
        }
        $server = $server->first();
        return view('server', compact('server'));
    }

    public function serverEdit(Request $request, $id)
    {
        $server = Server::where('id', $id)->where('isActive', 1)->with('user')->get();
        if (count($server) == 0) {
            abort(404);
        }
        $user = $request->user();
        $server = $server->first();

        if ($user->id != $server->user_id) {
            abort(403);
        }
        return view('cp.editserver', compact('server'));
    }

    public function serverUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:40'],
            'ip' => ['required', 'string', Rule::unique('servers', 'ip')->ignore($id)],
            'website' => ['max:150'],
            'banner' => ['file', 'dimensions:max_width:468,max_height:60'],
            'description' => ['required', 'string', 'max:1500'],
            'types' => ['string']
        ])->validate();

        $server = Server::find($id);

        if (!$server) abort(404);

        $banner = $server->image;

        if($request->banner){
            $banner = $this->upload_server_banner($request);
        }

        $server->name = $request->name;
        $server->ip = $request->ip;
        $server->webSiteUrl = $request->website;
        $server->image = $banner;
        $server->description = $request->description;
        $server->type = $request->types;
        $server->save();


        return redirect()->route('server.edit', ['id' => $id])->with('success', 'İşlem başarılı!');
    }

    public function serverList(Request $request)
    {
        $servers = Server::where('user_id', $request->user()->id)->orderByDESC('created_at')->get();
        return view('cp.myservers', compact('servers'));
    }


    public function deleteServer(Request $request, $server_id)
    {

        $server = Server::find($server_id);

        if (!$server) {
            throw ValidationException::withMessages(['message' => 'Server bulunamadı ']);
        }

        if ($server->user_id != $request->user()->id) {
            throw ValidationException::withMessages(['message' => 'Bu server\'i silme yetkiniz yok!']);
        }

        $server->delete();

        return redirect()->route('server.list')->with('success', 'İşlem başarılı!');
    }


    public function serverCreate(Request $request)
    {
        return view('cp.addserver');
    }

    public function serverStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:40'],
            'ip' => ['required', 'string', Rule::unique('servers', 'ip')],
            'website' => ['max:150'],
            'banner' => ['file', 'dimensions:max_width:468,max_height:60'],
            'description' => ['required', 'string', 'max:1500'],
            'types' => ['string']
        ])->validate();

        $server = Server::create([
            'name' => $request->name,
            'user_id' => $request->user()->id,
            'ip' => $request->ip,
            'image' => $this->upload_server_banner($request),
            'websiteUrl' => $request->website,
            'description' => $request->description,
            'type' => $request->types,
        ]);

        return redirect()->route('server.list')->with('success', 'İşlem başarılı!');
    }


    public function upload_server_banner(Request $request)
    {
        $path = 'img/nobanner.png';
        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $fileName = time() . rand(0, 900000) . '.' . $image->getClientOriginalExtension();

            $path = 'img/servers/' .
                Carbon::now()->format('Y') . '/' . Carbon::now()->format('m') . '/' .
                Carbon::now()->format('d');

            $path = Storage::disk('fake_public')->putFileAs($path, $image, $fileName);
        }
        return $path;
    }
}
