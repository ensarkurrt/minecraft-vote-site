@extends('layouts.master')

@section('title', 'Minecraft Sunucu Sorgulama')

@section('content')

    <div class="ui segments enchanced">
        <h2 class="section-title"> @yield('title') </h2>
        <div class="ui stackable grid loggy">
            <div class="eight wide column">
                <form class="ui form" action="{{ route('ping.detail') }}" method="post">
                    @csrf

                    <div class="field">
                        <label>
                            Ip / Host
                            <input type="text" name="host" placeholder="Ip / Host" maxlength="100"
                                   value="{{ old('host') ? old('host') : isset($ping->host) ? $ping->host : ''}}"
                                   required autofocus>
                        </label>
                    </div>
                    <button class="ui button submit" type="submit" name="submit">Kontrol Et</button>
                    @component('components.alert.status-alert')@endcomponent
                    @component('components.alert.validation-alert')@endcomponent
                </form>
            </div>
            @if(isset($ping))
                <div class="eight wide column">
                    <table class="ui table whyus">
                        <div class="ui success message">
                            <i class="close icon"></i>
                            <div class="header"></div>
                            <p>İşlem Başarılı</p>
                        </div>

                        <tbody>
                        <tr>
                            <td><strong><i class="clock outline icon"></i> Durum:</strong></td>
                            <td>{{$ping->status}}</td>
                        </tr>
                        @if(isset($ping->status) && $ping->status == 'Online')
                            <tr>
                                <td><strong><i class="user circle icon"></i> Oyuncular:</strong></td>
                                <td>{{ $ping->onlinePlayer .' / '.$ping->maxPlayer }}</td>
                            </tr>
                            <tr>
                                <td><strong><i class="globe alternate icon"></i> Version:</strong></td>
                                <td>{{$ping->version}}</td>
                            </tr>
                            <tr>
                                <td><strong><i class="shield alternate icon"></i> MOTD:</strong></td>
                                <td>{{substr($ping->motd,0,30)}}</td>
                            </tr>
                            <tr>
                                <td><strong><i class="compass alternate icon"></i> Protokol:</strong></td>
                                <td>{{$ping->protocol}}</td>
                            </tr>
                        @endif
                        <tr>
                            <td><strong><i class="sitemap alternate icon"></i> Host:</strong></td>
                            <td>{{$ping->host}}</td>
                        </tr>
                        </tbody>
                    </table>
                    {{--   <a class="ui fluid large basic button"
                          href="https://www.survivalservers.com/?trckaff=75582&amp;trckit="
                          title="Visit Hytale Hosting - SurvivalServers" rel="nofollow noopener">Visit
                           SurvivalServers.com</a>--}}
                </div>
            @endif
        </div>
    </div>
@endsection
