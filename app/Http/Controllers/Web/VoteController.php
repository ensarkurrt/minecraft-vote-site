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

    /* Votefier */

    use D3strukt0r\Votifier\Client\Exception\NotVotifierException;
    use D3strukt0r\Votifier\Client\Exception\NuVotifierChallengeInvalidException;
    use D3strukt0r\Votifier\Client\Exception\NuVotifierException;
    use D3strukt0r\Votifier\Client\Exception\NuVotifierSignatureInvalidException;
    use D3strukt0r\Votifier\Client\Exception\NuVotifierUnknownServiceException;
    use D3strukt0r\Votifier\Client\Exception\NuVotifierUsernameTooLongException;
    use D3strukt0r\Votifier\Client\Exception\Socket\NoConnectionException;
    use D3strukt0r\Votifier\Client\Exception\Socket\PackageNotReceivedException;
    use D3strukt0r\Votifier\Client\Exception\Socket\PackageNotSentException;
    use D3strukt0r\Votifier\Client\Server\ServerInterface;
    use D3strukt0r\Votifier\Client\Vote\ClassicVote;
    use D3strukt0r\Votifier\Client\Server\NuVotifier;

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

            $vote = Vote::where('nickname', trim($request->username))->where('server_id', $id)->get();

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

            $server = (new NuVotifier())
                ->setHost('45.155.124.124')
                ->setProtocolV2(true)
                ->setToken('ttfp4l6lgcdsoh2350imkp3gbk');

            $vote = (new ClassicVote())
                ->setUsername($request->username)
                ->setServiceName('vote-site')
                ->setAddress('127.0.0.1');

            try {
                /** @var ServerInterface $server */
                $server->sendVote($vote);
                // Connection created, and vote sent. Doesn't mean the server handled it correctly, but the client did.
            } catch (InvalidArgumentException $e) {
                // Not all variables that are needed have been set. See $e->getMessage() for all errors.
                throw ValidationException::withMessages(['message' => 'Oy verme sisteminde bir hata oluştu!']);
            } catch (NoConnectionException $e) {
                // Could not create a connection (socket) to the specified server
                throw ValidationException::withMessages(['message' => 'Oy verme sisteminde bir hata oluştu!']);
            } catch (PackageNotReceivedException $e) {
                // If the package couldn't be received, for whatever reason.
                throw ValidationException::withMessages(['message' => 'Oy verme sisteminde bir hata oluştu!']);
            } catch (PackageNotSentException $e) {
                // If the package couldn't be send, for whatever reason.
                throw ValidationException::withMessages(['message' => 'Oy verme sisteminde bir hata oluştu!']);
            } catch (NotVotifierException $e) {
                // The server didn't give a standard Votifier response
                throw ValidationException::withMessages(['message' => 'Oy verme sisteminde bir hata oluştu!']);
            } catch (NuVotifierChallengeInvalidException $e) {
                // Specific for NuVotifier: The challenge was invalid (Shouldn't happen by default, but it's here in case).
                throw ValidationException::withMessages(['message' => 'Oy verme sisteminde bir hata oluştu!']);
            } catch (NuVotifierSignatureInvalidException $e) {
                // Specific for NuVotifier: The signature was invalid (Shouldn't happen by default, but it's here in case).
                throw ValidationException::withMessages(['message' => 'Oy verme sisteminde bir hata oluştu!']);
            } catch (NuVotifierUnknownServiceException $e) {
                // Specific for NuVotifier: A token can be specific for a list, so if the list isn't supposed to use the given token, this message appears.
                throw ValidationException::withMessages(['message' => 'Oy verme sisteminde bir hata oluştu!']);
            } catch (NuVotifierUsernameTooLongException $e) {
                // Specific for NuVotifier: A username cannot be over 16 characters (Why? Don't ask me)
                throw ValidationException::withMessages(['message' => 'Oy verme sisteminde bir hata oluştu!']);
            } catch (NuVotifierException $e) {
                // In case there is a new error message that wasn't added to the library, this will take care of that.
                throw ValidationException::withMessages(['message' => 'Oy verme sisteminde bir hata oluştu!']);
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
