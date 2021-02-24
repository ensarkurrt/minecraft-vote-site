@extends('cp.layouts.master')

@section('rightBarContent')

    <a class="ui right floated button submit" href="{{route('server.create')}}" title="Yeni Serve Ekle">
        <i class="plus icon" aria-hidden="true"></i> Server Ekle </a>
    <div class="clearfix"></div>
    <hr style="margin-top: 15px; margin-bottom: 0!important">
    <table class="ui very basic table servers userServers" id="cp" style="border: none !important;">
        <tbody>
        @foreach($servers as $server)
            @include('components.server.accountList',['main.server'=>$server])
        @endforeach

        @if(count($servers) == 0 )
            <tr>
                <td colspan="2" class="ui center aligned server no-server">
                    <i class="ban icon"></i>Server Bulunamadı
                </td>
            </tr>
        @endif

        </tbody>
    </table>

    <div>
        <hr style="margin-top:0">
        <i class="server icon"></i> Serverların:
        <strong>{{count($servers)}}</strong>
    </div>
@endsection


