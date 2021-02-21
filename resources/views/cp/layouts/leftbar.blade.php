<div class="five wide column" id="cpMenu">
    <div class="ui vertical fluid menu insta-search cpNavigation" style="padding: 0 10px;">
        <a class="{{ Str::contains(\Request::route()->getName(), 'server.list') ? 'active' : '' }} item" href="{{route('server.list')}}">
            <i class="server icon"></i> Serverlerim </a>
        <a class="{{ Str::contains(\Request::route()->getName(), 'server.create') ? 'active' : '' }} item" href="{{route('server.create')}}">
            <i class="plus icon"></i> Server Ekle </a>
        <a class="{{ Str::contains(\Request::route()->getName(), 'account') ? 'active' : '' }} item" href="{{route('account')}}">
            <i class="cog icon"></i> Hesap Ayarları </a>
    </div>
</div>
