<tr itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">

    {{-- Rank Bölümü--}}
    <td class="rank">
        <span class="ranking" itemprop="position"> {{$server->rank}} </span>
    </td>

    {{-- İsim Bölümü--}}
    <td class="name">
        <a href="" itemprop="url"
           title="{{$server->name}}">
            <h3 class="server-name" itemprop="name">
                <label class="listing">Server</label>
                {{$server->name}}
            </h3>
        </a>
    </td>

    {{-- Resim Bölümü--}}
    <td class="server">
        <a href="/{{$server->slug}}" class="bnr" title="{{$server->name}} Page">
            <img class="ui fluid image lazyImg fade"
                 src="{{asset('img/servers/'.$server->image)}}"
                 data-src="{{asset('img/servers/'.$server->image)}}" width="468" height="60"
                 itemprop="image" alt="{{config('app.name')}} - {{$server->name}} Banner" data-loaded="true">
        </a>
        <div class="server-ip">
                        <span>
                            <i class="{{$server->country ? $server->country :'tr' }} flag" aria-hidden="true"></i>
                           {{$server->ip}} </span>
            <div class="copy-action" data-clipboard-text="{{$server->ip}}">
                <button class="copy-text">
                    <i class="cut icon notMb" aria-hidden="true"></i>
                    kopyala
                </button>
                <button class="copy-success" aria-label="copy">
                    <i class="thumbs up outline icon" aria-hidden="true"></i></button>
            </div>
        </div>
    </td>


    <td class="players">
        <label class="listing">Oyuncu</label>
        {{$server->onlinePlayer}} / {{$server->maxPlayer}}
    </td>
    <td class="status">
        <span class="ui basic {{$server->status ? 'green' : 'red' }} button">{{$server->status ? 'Online' : 'Offline' }}</span>
    </td>
</tr>
