@extends('cp.layouts.master')


@section('rightBarContent')
    <form class="ui small form" action="{{route('server.store')}}" enctype="multipart/form-data"
          method="post">
        <h4 class="ui dividing header"><i class="plus square icon"></i> Server Ekle</h4>
        @csrf
        <div class="required field">
            <label>Sunucu Adı</label>
            <input type="text" name="name" placeholder="Sunucu Adı" maxlength="40" required autofocus>
            <small>Only enter the server name - nothing else</small>
        </div>
        <div class="required field">
            <label>Bağlantı IP:Port/Host</label>
            <input type="text" name="ip" placeholder="Bağlantı IP:Port/Host" required>
        </div>
        <div class="field">
            <label>Web Site</label>
            <input type="text" name="website" placeholder="Web Site" value="" maxlength="150">
            <small> https:// yada http:// ile başlamalıdır</small>
        </div>
        <div class="field">
            <label>Banner</label>
            <input type="file" name="banner">
            <small>Resim boyutu 468x60 pixel olmalıdır</small>
        </div>

        <div class="required field">
            <label>Açıklama</label>
            <textarea name="description" placeholder="Açıklama" required rows="4"
                      maxlength="1500"></textarea>
        </div>

        <div class="field">
            <label>Etiketler</label>
            <div class="ui fluid multiple search normal selection dropdown" id="selectTypes">
                <input type="hidden" name="types" maxlength="200">
                <i class="dropdown icon"></i>
                <input class="search" autocomplete="off" tabindex="0"><span class="sizer"></span><span
                    class="sizer"></span>
                <div class="default text">Etiket seç</div>
                @php
                    $types = ['Anarchy','Creative','Economy','Factions','FTB','Hardcore','KitPvP','MCMMO','Mini Games','Parkour','Pixelmon','Prison'];
                @endphp
                <div class="menu" tabindex="-1">
                    @foreach($types as $type)
                        <div class="item" data-value="{{$type}}">{{$type}}</div>
                    @endforeach
                </div>
            </div>
            <small>Serverinizi en iyi açıklayacak en fazla 3 etiket seçin</small>
        </div>

        <button class="ui button submit" type="submit" name="submit">Gönder</button>
        <a class="ui red basic button" href="{{route('server.list')}}">İptal</a>
    </form>
@endsection


