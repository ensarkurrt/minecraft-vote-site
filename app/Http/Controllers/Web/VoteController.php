<?php

namespace App\Http\Controllers\Web;

use App\Models\Server;
use App\Models\Vote;
use App\Models\VoteIp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class VoteController extends Controller
{
    public function show(Request $request, $id)
    {
        $server = Server::find($id)->with(['votes' => function ($query) {
            return $query->orderByDesc('voteCount');
        }])->get()->first();
        return view('main.vote', compact('server'));
    }

    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string']
        ])->validate();

        $user = $request->user();

        $now = Carbon::now(config('app.timezone'));

        $server = Server::find($id);
        $ip = $this->getIp();

        $lastVote = VoteIp::where('ip', $ip)->orderByDesc('updated_at')->get();

        if (count($lastVote) == 0) {
            $voteIp = VoteIp::create([
                'ip' => $ip
            ]);
        } else {
            $lastVote = $lastVote->first();
            $passingDays = $now->diffInDays($lastVote->updated_at, true);
            if ($passingDays < 1) {
                $keyword = 'saat';
                $passing = 24 - $now->diffInHours($lastVote->updated_at, true);
                /*  if ($passing < 0) {
                      $keyword = 'dakika';
                      $passing =  ((($now->diffInMinutes($lastVote->updated_at, true)/60) / 60) / 24);
                      if ($passing < 0) {
                          $keyword = 'saniye';
                          $passing = 60 - $now->diffInSeconds($lastVote->updated_at, true);
                      }
                  }*/
                throw ValidationException::withMessages(['message' => 'Yeniden oy verebilmeniz için ' . $passing . ' ' . $keyword . ' geçmelidir!']);
            }
            $lastVote->updated_at = $now;
            $lastVote->save();
        }

        $vote = Vote::where('nickname', trim($request->username))->where('server_id',$id)->get();

        if (count($vote) == 0) {
            $vote = Vote::create([
                'nickname' => trim($request->username),
                'server_id' => $id,
            ]);
        } else {
            $updated = false;
            for ($i = 0; $i < count($vote); $i++) {
                $inVote = $vote[$i];
                if (trim($request->username) == trim($inVote->nickname) && !$updated) {
                    $inVote->voteCount += 1;
                    $inVote->save();
                    $updated = true;
                    break;
                }
            }
            if (!$updated) {
                $vote = Vote::create([
                    'nickname' => trim($request->username),
                    'server_id' => $id,
                ]);
            }
            /*
                        $vote = $vote->first();
                        if (trim($request->username) == trim($vote->nickname)) {
                            $vote->voteCount += 1;
                            $vote->save();
                        } else {
                            $vote = Vote::create([
                                'nickname' => trim($request->username),
                                'server_id' => $id,
                            ]);
                        }*/
        }

        return redirect()->route('vote.show', ['id' => $id])->with('success', 'İşlem başarılı!');
    }

    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
