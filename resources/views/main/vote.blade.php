@extends('layouts.master')

@section('title', $server->name .' Server')

@section('content')
    <div class="ui stackable grid voting">
        <div class="ten wide column" id="serverPage">
            <div class="ui top attached tabular menu vote default-color">
                <span class="item">
                <i class="thumbs up icon" aria-hidden="true"></i> {{$server->name}} için oy ver! </span>
            </div>
            <div class="ui tab segment discord">
                <form class="ui form" action="{{route('vote.show',['id'=>$server->id])}}" method="post"
                      id="main-content">
                    @csrf
                    <div class="field">
                        <label>Your Nickname</label>
                        <input type="text" name="username" placeholder="Your Nickname" maxlength="30" required="">
                    </div>
                    {{-- <div class="field">
                         <img id="captcha" src="/captcha.png" width="160" height="45" border="0" class="captchaImg">
                         <a href="#"
                            onclick="document.getElementById('captcha').src = '/captcha.png?' + Math.random(); document.getElementById('imageVerification').value = ''; return false;">
                             Refresh Image </a>
                     </div>
                     <div class="field">
                         <input type="text" name="captcha" placeholder="Captcha" maxlength="8" required="">
                     </div>--}}
                    <button class="ui button submit" type="submit" name="submit">Oy Ver!</button>
                    <a class="ui basic button" href="{{route('server.show',['id'=>$server->id])}}"
                       title="Visit Server deneme1 Page">Sunucu sayfasına dön</a>
                    @include('components.alert.validation-alert')
                    @include('components.alert.status-alert')
                </form>
            </div>
        </div>
        <div class="six wide column">
            <table class="ui striped table info">
                <thead class="dispy">
                <tr>
                    <th class="rank default-color" colspan="2">
                        <i class="users icon" aria-hidden="true"></i> Ayın en çok oy verenleri
                    </th>
                </tr>
                </thead>
                <tbody class="serverInfo voters">
                @if($server->votes==null || count($server->votes)==0)
                    <tr class="centered">
                        <td colspan="2">Henüz oy verilmemiş</td>
                    </tr>
                @else
                    @foreach($server->votes as $vote)
                        <tr>
                            <td>
                                <img src="/CSS/images/avatars/avatar1.png?1" width="22" height="22"
                                     alt="{{$server->name}} Oyuncusu {{$vote->nickname}} Avatar" class="voterAvatar">
                                {{$vote->nickname}}
                            </td>
                            <td>{{$vote->voteCount}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="ui fluid button submit" href="{{route('index')}}"
               title="All Hytale Servers, Hytale Server List"><i class="list ul icon" aria-hidden="true"></i> Tüm
                Sunucular</a>
        </div>
    </div>
@endsection
