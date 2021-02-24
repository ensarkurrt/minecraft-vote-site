@extends('layouts.master')

@section('title', $server->name .' Server')

@section('content')
    <div class="ui stackable grid srv">
        <div class="six wide column">
            <table class="ui striped table info">
                <thead class="dispy">
                <tr>
                    <th class="rank default-color" colspan="2">
                        <i class="server icon" aria-hidden="true"></i> {{$server->name}}
                    </th>
                </tr>
                </thead>


                <tbody class="serverInfo">
                <tr>
                    <td>Sahip</td>
                    <td>{{$server->user->username}}</td>
                </tr>
                <tr>
                    <td>Durum</td>
                    <td><span
                            class="ui basic {{ $server->status ? 'green' : 'red' }} button">{{ $server->status ? 'Online' : 'Offline' }}</span>
                    </td>
                </tr>
                <tr>
                    <td>IP</td>
                    <td>{{$server->ip}}</td>
                </tr>
                @if($server->webSiteUrl != null)
                    <tr>
                        <td>Web Site</td>
                        <td><a href="{{$server->webSiteUrl}}" rel="nofollow noopener"
                               target="_blank"
                               title="{{$server->name }} Website'sini ziyaret et">Website'sini ziyaret et</a></td>
                    </tr>
                @endif
                <tr>
                    <td>Oyuncular</td>
                    <td>{{$server->onlinePlayer}}/{{$server->maxPlayer}}</td>
                </tr>
                <tr>
                    <td>Rank</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Oylar</td>
                    <td>{{$server->vote}}</td>
                </tr>
                <tr>
                    <td>Uptime</td>
                    <td>{{$server->uptime ?? '0' }}%</td>
                </tr>
                <tr>
                    <td>Son Kontrol</td>
                    <td>
                        {{$server->lastCheck ?? 'Kontrol Bekleniyor'}}
                    </td>
                </tr>
                <tr>
                    <td>Ülke</td>
                    <td><i class=" {{$server->country}} flag"></i> {{$server->country == 'tr' ? 'Türkiye' : ''}}</td>
                </tr>
                <tr>
                    <td>Tip</td>
                    <td>

                        @foreach(explode(',',$server->type) as $type)
                            <a href="#" class="ui label" title="{{$type}} Minecraft Servers">{{$type}}</a>
                        @endforeach

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a class="ui fluid button submit" href="{{route('vote.show', ['id'=> $server->id])}}"
                           title="Voting gateway for this Hytale server">Oy Ver!</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="ten wide column" id="serverPage">
            <button class="fluid ui top attached button toggle-button" id="toggleServerMenu">
                <i class="bars icon"></i> Server Menü
            </button>
            <div class="ui top attached tabular menu default-color nav-menu">
                <a class="item active" href="#/description" title="Hytaler Info" data-tab="description">
                    <i class="info circle icon" aria-hidden="true"></i> Bilgi </a>
                <a class="item" href="#/players" title="Hytaler Players List" data-tab="players">
                    <i class="users icon" aria-hidden="true"></i> Oyuncular
                </a>
                <a class="item" href="#/statistics" title="Hytaler Stats" data-tab="stats">
                    <i class="chart bar icon" aria-hidden="true"></i> İstatistik </a>
                <a class="item" href="#/banners" title="Hytaler Banner" data-tab="banners">
                    <i class="image outline icon" aria-hidden="true"></i> Banner
                </a>
            </div>
            <div class="ui bottom attached active tab segment" id="description" data-tab="description">
                <p class="center-element">
                    <img class="banner lazyImg fade" src="../{{$server->image}}"
                         data-src="../{{$server->image}}" width="468" height="60"
                         alt="Hytale Server - {{$server->name}} Banner" data-loaded="true">
                </p>
                <hr>
                <p>{{$server->description}}</p>
            </div>
            <div class="ui bottom attached tab segment" id="stats" data-tab="stats">
                <div class="ui stackable grid stats serverStats">
                    <div class="seven wide column">
                        <div class="ui tiny form">
                            <div class="field">
                                <input type="hidden" name="serverid" value="60" readonly="readonly">
                                <input type="hidden" name="sitelink" value="https://thehytaleservers.org"
                                       readonly="readonly">
                                <label for="timeframe">Time Frame:</label>
                                <select id="timeframe">
                                    <option value="1" selected="">24 Hours</option>
                                    <option value="2">7 Days</option>
                                    <option value="3">30 Days</option>
                                </select>
                            </div>
                            <div class="field">
                                <label for="statisticstype">Number of:</label>
                                <select id="statisticstype">
                                    <option value="1" selected="">Players</option>
                                    <option value="2">Votes</option>
                                </select>
                            </div>
                            <div class="field">
                                <label for="timeframe">Share Link:</label>
                                <input type="text" name="sharelink"
                                       value="https://thehytaleservers.org/serverChart-60-1-1.png" readonly="readonly">
                                <small>Share server statistical data by using the link above.</small>
                            </div>
                        </div>
                    </div>
                    <div class="nine wide column">
                        <img class="ui fluid image lazyImg statsImg" src="/CSS/images/nostat_load.png"
                             data-src="https://thehytaleservers.org/serverChart-60-1-1.png" width="300" heigh="250"
                             alt="Server Statistical Players Data">
                    </div>
                </div>
            </div>
            <div class="ui bottom attached tab segment" id="players" data-tab="players">
                Hytale isn't launched yet. Querying mechanism to query players data isn't set in place. Once the game
                will be launched we will do nessesary adjustments.
            </div>
            <div class="ui bottom attached tab segment" id="banners" data-tab="banners">
                <form class="ui small form" id="bannerGenerator" action="#" method="post">
                    <p class="center-element"><img src="https://thehytaleservers.org/voteimg-60-4D5988-FFFFFF.png"
                                                   alt="Generated Banner Preview" width="468" height="60"
                                                   class="banner generated_banner" id="imagePreview"></p>
                    <hr>
                    <input type="hidden" name="link" value="https://thehytaleservers.org/hytale-servers/in-60">
                    <input type="hidden" name="image" value="https://thehytaleservers.org/voteimg-60-">
                    <input type="hidden" name="width" value="468">
                    <input type="hidden" name="height" value="60">
                    <input type="hidden" name="server" value="60">
                    <input type="hidden" name="title" value="Hytaler | Hytale Servers, Hytale Server List">
                    <div class="field">
                        <label for="colorscheme"><i class="cog icon" aria-hidden="true"></i> Color Scheme</label>
                        <select name="colorScheme" id="colorscheme" onchange="code('#bannerGenerator');"
                                onkeyup="code('#bannerGenerator');">
                            <option value="default" selected="selected">Default</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="orange">Orange</option>
                            <option value="custom">Generate Custom</option>
                        </select>
                    </div>
                    <div class="field custom" style="display: none;">
                        <div class="field styled-pick">
                            <label for="bgColor"><i class="cog icon" aria-hidden="true"></i> Background Color</label>
                            <input type="text" id="bgColor" class="color_sel" name="color1"
                                   onblur="code('#bannerGenerator');" onchange="code('#bannerGenerator');"
                                   value="4D5988"
                                   style="background-color: rgb(77, 89, 136); color: rgb(255, 255, 255);">
                        </div>
                        <div class="field styled-pick">
                            <label for="fontColor"><i class="cog icon" aria-hidden="true"></i> Font Color</label>
                            <input type="text" id="fontColor" class="color_sel" name="color2"
                                   onblur="code('#bannerGenerator');" onchange="code('#bannerGenerator');"
                                   value="FFFFFF" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);">
                        </div>
                    </div>
                    <hr>
                    <div class="field">
                        <label for="htmlCode">HTML Code</label>
                        <input type="text" placeholder="HTML Code" id="htmlCode" name="html"
                               onfocus="javascript:this.select()" readonly="">
                    </div>
                    <div class="field">
                        <label for="bbCode">BB Code</label>
                        <input type="text" placeholder="BB Code" id="bbCode" name="bb"
                               onfocus="javascript:this.select()" readonly="">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
