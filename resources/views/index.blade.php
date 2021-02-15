@extends('layouts.master')

@section('title',config('app.name','Laravel').' Server Listesi')
@section('page_desc','Açıklama buraya gelecek')
@section('content')
    <table class="ui table servers">
        <!-- <thead>
             <tr>
                 <th class="rank default-color">Rank</th>
                 <th class="name default-color">Name</th>
                 <th class="server default-color">Server</th>
                 <th class="players default-color">Players</th>
                 <th class="status default-color">Status</th>
             </tr>
         </thead>-->
        <tbody>

        @foreach ($servers as $server)
            @include('components.server.list',$server)
        @endforeach
        {{--@include('components.server.list',$server)--}}


        </tbody>
        <tfoot>
        <tr>
            <th colspan="5">
                <div class="ui left floated pagination menu" itemscope=""
                     itemtype="http://schema.org/SiteNavigationElement">

                    @php
                        $currentPage = $pagination['current_page'];
                        $lastPage = $pagination['last_page'];
                    @endphp

                    @if($currentPage > 3)
                        <a class="item"
                           itemprop="url name"
                           href="?page=1">1</a>
                        <span class="item" itemprop="url">...</span>
                        <a class="item"
                           itemprop="url name"
                           href="?page={{$currentPage-1}}">{{$currentPage-1}}</a>
                    @else
                        @for($i=1; $i<4; $i++)
                            <a class="item {{ $currentPage == $i ? 'active':'' }}"
                               itemprop="url name"
                               href="?page={{$i}}">{{$i}}</a>
                        @endfor
                    @endif

                    @if($currentPage > 3 && $lastPage-$currentPage >= 3)
                        <a class="item active"
                           itemprop="url name"
                           href="?page={{$currentPage}}">{{$currentPage}}</a>
                    @endif


                    @if($lastPage-$currentPage>2)
                        @if(2 < $lastPage-$currentPage && $currentPage > 2)
                            <a class="item"
                               itemprop="url name"
                               href="?page={{$currentPage+1}}">{{$currentPage+1}}</a>
                        @endif

                        <span class="item" itemprop="url">...</span>
                        <a class="item"
                           itemprop="url name"
                           href="?page={{$lastPage}}">{{$lastPage}}</a>
                    @else
                        @for($i=$currentPage;$i<$lastPage;$i++)
                            <a class="item {{ $currentPage == $i ? 'active':'' }}"
                               itemprop="url name"
                               href="?page={{$i}}">{{$i}}</a>
                        @endfor
                    @endif


                </div>
                <div class="clearfix"></div>
            </th>
        </tr>

        </tfoot>
    </table>
@stop
{{-- <div class="required_content bottom">
    <center>Advertisement</center>
</div> --}}

