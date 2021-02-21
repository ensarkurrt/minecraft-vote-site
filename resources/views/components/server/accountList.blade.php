<tr>
    <td class="server">
        <a href="{{route('server.show', ['id' => $server->id])}}">
            <div class="name">
                <h3 class="server-name">
                    {{$server->name}} </h3>
            </div>
        </a>
        <div class="serverActions">
            <div class="clearfix"></div>
            <a href="{{route('server.edit', ['id'=> $server->id])}}" style="margin-right: 1em">
                Düzenle <i class="pencil alternate icon"></i>
            </a>
            <a href="{{route('server.delete',['server_id'=>$server->id])}}" style="margin-right: 1em"
               data-confirm="Bu sunucuyu silmek istediğinize emin misiniz ?" class="confirm">
                Sil <i class="trash alternate icon"></i>
            </a>
            {{-- <a href="https://thehytaleservers.org/server-deneme-id83#/banners">
                 Banners <i class="file image icon"></i>
             </a>--}}
            <div class="clearfix"></div>
        </div>
    </td>
    <td class="status" style="text-align: right!important">
        <a href="{{route('server.edit', ['id'=> $server->id])}}" style="margin-right: .5em" data-tooltip="Düzenle">
            <i class="pencil alternate icon"></i>
        </a>
        <a href="{{route('server.delete',['server_id'=>$server->id])}}" style="margin-right: .5em"
           data-confirm="Bu sunucuyu silmek istediğinize emin misiniz ?" class="confirm" data-tooltip="Sil">
            <i class="trash alternate icon"></i>
        </a>
        <a href="{{route('server.show', ['id' => $server->id])}}"
           data-tooltip="Görüntüle">
            <i class="file image icon"></i>
        </a>
    </td>
</tr>
