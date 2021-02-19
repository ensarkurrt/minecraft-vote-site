@include('layouts.partials.header')

<p class="underH1">
    @yield('page_desc')
</p>


<ol class="ui small breadcrumb">
    <li class="active">Anasayfa</li>
    <li class="divider">/</li>
    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <span itemprop="name">@yield('title')</span>
        <meta itemprop="position" content="2">
    </li>
</ol>

{{--<h2 class="section-title"> @yield('title') </h2>--}}

<div class="ui stackable grid ">
    @yield('content')
</div>

{{--<hr class="bottom">--}}
</main>

@include('layouts.partials.footer')


</body>



</html>

