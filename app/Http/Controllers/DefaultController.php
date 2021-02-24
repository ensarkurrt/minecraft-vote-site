<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;

class DefaultController extends Controller
{
    // TODO:: Types table query from database
    public function index(Request $request)
    {
        $servers = Server::where('isActive', 1)->orderByRaw("status DESC, vote DESC")->paginate(5);

        $pagination = json_decode($servers->toJson(), true);

        return view('main.index', compact('servers'), compact('pagination'));
        /*
          <div class="ui warning message">
<i class="close icon"></i>
<div class="header">Actions Required</div>
<p>Please verify your email address in <strong>24 Hours</strong> or your account will get deleted. Check your email inbox/spambox for verification code.</p>
</div>

        */
    }

    public function about()
    {
        $termsFile = Jetstream::localizedMarkdownPath('about.md');

        $environment = Environment::createCommonMarkEnvironment();
        $environment->addExtension(new GithubFlavoredMarkdownExtension());

        return view('main.about', [
            'about' => (new CommonMarkConverter([], $environment))->convertToHtml(file_get_contents($termsFile)),
        ]);
    }

    public function contact()
    {
        return view('main.contact');
    }
}
