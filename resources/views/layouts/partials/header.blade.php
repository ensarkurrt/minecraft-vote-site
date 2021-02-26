<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    {{--<link rel="stylesheet" href="{{asset('css/minified.css?c1')}}">--}}

    <meta name="description"
          content="Hytale servers, find the best Hytale multiplayer servers to play with our Hytale server list.">

    <link rel="stylesheet" href="{{asset('css/minified.css?45')}}">
    <link rel="stylesheet" href="{{asset('css/newStyle.css?46')}}">

    <style>
        @font-face {
            font-family: "Bitstream Vera Serif Bold";
            src: url("https://fonts.googleapis.com/css?family=Roboto");
        }

        body,
        html {
            background: #FFFFFF;
        }

        #serverPage p,
        td.server p.description {
            overflow-wrap: break-word;
            word-wrap: break-word;
            -ms-word-break: break-all;
            word-break: break-all;
            word-break: break-word;
            -ms-hyphens: auto;
            -moz-hyphens: auto;
            -webkit-hyphens: auto;
            hyphens: auto;
        }

        .fancy-wrap {
            padding: 10px;
        }

        .default-color,
        .or:before,
        .ui.button.submit {
            color: #ffffff !important;
            opacity: .99
        }
        /*background: #4b5787 !important;*/

        .insta-search .button {
            color: #ffffff !important;
            background: #4b5787 !important;
        }

        .default-color a,
        .default-color .item,
        .server-ip {
            color: #ffffff !important
        }

        .server-ip {
            background: #4b5787
        }

        .ui.segment.list {
            padding-top: 1rem;
        }

        #server .ui.label {
            margin: .25em .5em .25em 0;
        }

        .copy-action:hover,
        nav .ui.button:hover,
        .button.active,
        .setti .ui.active.button,
        .right.menu .ui.button:focus,
        .setti .ui.button:focus,
        .insta-search .button:hover {
            color: #ffffff !important;
            background: rgba(88, 106, 167, 0.6) !important;
            transition: all .5s;
        }

        .insta-search .button:hover,
        .button.active {
            background: rgba(88, 106, 167, 0.8) !important;
        }

        .ui.button.submit:hover,
        #server .ui.label:hover {
            transition: all .5s;
            opacity: .9;
        }

        .tabular.menu.default-color .active.item,
        .tabular.menu.default-color .item:hover {
            border-bottom: 5px solid rgb(88, 106, 167);
        }

        .ui.nag {
            border-radius: 0;
            display: block;
            position: fixed;
            top: auto;
            bottom: 0;
            opacity: .9;
        }

        .line.social a {
            color: #000000;
            font-size: 1.8em;
        }

        .line.social a:hover {
            opacity: .8;
        }

        .siteLogo {
            width: 100%;
            max-height: 300px;
            height: auto;
        }

        .mobile_ad {
            max-width: 728px;
            width: 100%;
            min-height: 90px;
            max-height: 120px;
            overflow: hidden;
            text-align: center;
            margin: 0 auto;
        }

        .adsbygoogle {
            display: block;
        }

        #serverStats .ltr,
        #serverStats svg,
        #serverStats {
            width: 100%;
            height: auto
        }

        .siteLogo {
            max-width: 400px;
            height: auto;
        }

        .logoIco {
            width: 42px;
            height: 45px;
            margin-right: 5px;
            vertical-align: middle
        }

        .statsImg {
            max-width: 300px !important;
            max-height: 250px !important;
            display: block;
            margin: 0 auto !important;
        }

        .ui.grid.stats {
            margin-top: -15px !important;
            margin-bottom: -15px !important;
        }

        #bannerGenerator p {
            margin: 0 !important;
        }

        .srvIcon {
            margin-left: 3px;
        }

        .required_content {
            overflow: hidden
        }

        .sharebtn {
            opacity: 1;
            transition: all .6s;
            color: #FFFFFF !important;
            text-shadow: 1px 1px 0 rgba(0, 0, 0, .25);
            background: #dddddd;
            font-size: 1.4em;
            color: #FFFFFF;
            margin-bottom: 10px;
            width: 100%;
            padding: 7px 10px;
            text-align: center;
            border-radius: .25em;
            display: block
        }

        .sharebtn span {
            display: none;
        }

        .sharebtn.facebook {
            background: #2D4373;
        }

        .sharebtn.twitter {
            background: #55ACEE;
        }

        .sharebtn.tumblr {
            background: #273344;
        }

        .sharebtn.mail {
            background: #5E5E5E;
        }

        .sharebtn.pinterest {
            background: #8C0615;
        }

        a.sharebtn:hover {
            text-decoration: none !important;
            opacity: .8;
            transition: all .6s
        }

        #back-to-top.show {
            opacity: 1;
            display: inline;
        }

        #back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            background: rgba(71, 88, 119, .8);
            color: #FFFFFF;
            cursor: pointer;
            border: 0;
            border-radius: 2px;
            text-decoration: none;
            transition: all .2s ease;
            opacity: 0;
            display: none;
        }
    </style>

</head>

<body itemscope="" itemtype="http://schema.org/WebPage" class="pushable">
<!--googleoff: all-->
{{--  <div class="ui left vertical inverted menu sidebar">
      <a class="active item" href="https://thehytaleservers.org"
         title="Hytale Servers | Hytale Server List Homepage">Home</a>

      <a class="item" href="https://thehytaleservers.org/blog" title="Hytale Blog, News &amp; Updates">Blog</a>
      <a class="item" href="https://thehytaleservers.org/hosting"
         title="Hytale Hosting, Hytale Servers Hosting">Hosting</a>
      <a class="item" href="https://thehytaleservers.org/contacts" title="Contact Us For Any Enquiries">Contacts</a>
      <a class="item" href="https://thehytaleservers.org/register"
         title="Register New Account To Get More Players">Register</a>
      <a class="item" href="https://thehytaleservers.org/login" title="Log Into Your Hytale List Account">Login</a>
  </div>--}}
<!--googleon: all-->
<div class="pusher">
    <header>
        <nav class="ui top setti_menu menu default-color" itemscope=""
             itemtype="http://www.schema.org/SiteNavigationElement">
            <a href="#" class="active item toggle-sidebar" title="Toggle Hytale Server List Sidebar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="ui container">
                <a class="{{ Str::contains(\Request::route()->getName(), 'index') ? 'active' : '' }} item hd"
                   href="{{route('index')}}" itemprop="url"
                   title="{{config('app.name')}} | Anasayfa"><span itemprop="name">Anasayfa</span></a>
                <a class="{{ Str::contains(\Request::route()->getName(), 'about') ? 'active' : '' }} item hd"
                   href="{{route('about')}}" itemprop="url"
                   title="{{config('app.name')}} | Hakkımızda"><span itemprop="name">Hakkımızda</span></a>
                <a class="{{ Str::contains(\Request::route()->getName(), 'ping') ? 'active' : '' }} item hd"
                   href="{{route('ping.show')}}" itemprop="url"
                   title="{{config('app.name')}} | Hakkımızda"><span itemprop="name">Test Server</span></a>
                <a class="{{ Str::contains(\Request::route()->getName(), 'contact') ? 'active' : '' }} item hd"
                   href="{{route('contact')}}" itemprop="url"
                   title="{{config('app.name')}} | Hakkımızda"><span itemprop="name">İletişim</span></a>

                {{--<span class="ui dropdown item hd" tabindex="0">
                    Other Links
                    <i class="dropdown icon"></i>
                    <div class="menu" tabindex="-1">
                        <a class="item" href="https://thehytaleservers.org/blog" itemprop="url"
                            title="Hytale Blog, News &amp; Updates">
                            <span itemprop="name">Blog</span>
                        </a>
                        <a class="item" href="https://thehytaleservers.org/status-checker" itemprop="url"
                            title="Hytale Servers Status Checker">
                            <span itemprop="name">Status Checker</span>
                        </a>
                        <a class="item" href="https://thehytaleservers.org/contacts" itemprop="url"
                            title="Contact Us For Any Enquiries">
                            <span itemprop="name">Contacts</span>
                        </a>
                    </div>
                </span>--}}
                @if(!Auth::user())
                    <div class="right menu">
                        <a href="{{route('register')}}"
                           class="{{ Str::contains(\Request::route()->getName(), 'register') ? 'active' : '' }} item button"
                           itemprop="url"
                           title="{{config('app.name')}} | Kayıt Ol">
                            <span itemprop="name">Kayıt Ol</span>
                        </a>
                        <a href="{{route('login')}}"
                           class="{{ Str::contains(\Request::route()->getName(), 'login') ? 'active' : '' }} item button"
                           itemprop="url"
                           title="{{config('app.name')}} | Giriş Yap">
                            <span itemprop="name">Giriş Yap</span>
                        </a>
                    </div>
                @else
                    <div class="right menu">
                        <a href="{{route('account')}}"
                           class="{{ Str::contains(\Request::route()->getName(), 'addserver') || Str::contains(\Request::route()->getName(), 'myservers') || Str::contains(\Request::route()->getName(), 'account') ? 'active' : '' }} item button"
                           itemprop="url"
                           title="{{config('app.name')}} | Kontrol Paneli">
                            <span itemprop="name">Kontrol Paneli</span>
                        </a>
                        <a href="#"
                           onclick="document.getElementById('logoutForm').submit()"
                           class="item button"
                           itemprop="url"
                           title="{{config('app.name')}} | Çıkış Yap">
                            <span itemprop="name">Çıkış Yap</span>
                        </a>

                        <noscript>
                            <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                <input type="submit" value="Çıkış Yap"/>
                            </form>
                        </noscript>

                    </div>
                @endif

            </div>
        </nav>
        <!-- <div class="generalNoti">
             <div class="ui container">
                 <div class="left">
                     <i class="thumbtack icon" aria-hidden="true"></i> We are open and <small>*</small>ready for
                     launch of Hytale. Planning on opening a Hytale server? Register, add your future server &amp;
                     start gaining rankings - be ready for the hype of Hytale servers! <small>*</small>We will make
                     necessary changes and adjustments, once game released.
                 </div>
                 <div class="right">
                     <i id="close" class="close icon" aria-hidden="true"></i>
                 </div>
                 <div class="clearfix"></div>
             </div>
         </div>-->
    </header>
    <main class="ui container under-menu" itemscope="" itemtype="http://schema.org/ItemList">
        <link itemprop="itemListOrder" href="https://schema.org/ItemListOrderDescending">

        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
            @csrf
        </form>
    <!--<div id="dropdownPanel" class="ui container menuVisibility">
                <div class="ui stackable grid content">
                    <div class="eight wide column">
                        <button id="toggleCategories" class="ui button submit width100 mbOnly">Hytale
                            Categories</button>
                        <nav id="hytaleCatalogs" class="ui stackable grid categories notMb" itemscope=""
                            itemtype="http://www.schema.org/SiteNavigationElement">
                            <ul class="eight wide column typesList">
                                <li class="header">
                                    <strong>Hytale Types</strong>
                                </li>
                                <li>
                                    <a href="https://thehytaleservers.org/types/anarchy" title="Hytale Anarchy Servers"
                                        itemprop="url">
                                        <span itemprop="name">Anarchy</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://thehytaleservers.org/types/creative"
                                        title="Hytale Creative Servers" itemprop="url">
                                        <span itemprop="name">Creative</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://thehytaleservers.org/types/economy" title="Hytale Economy Servers"
                                        itemprop="url">
                                        <span itemprop="name">Economy</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://thehytaleservers.org/types/factions"
                                        title="Hytale Factions Servers" itemprop="url">
                                        <span itemprop="name">Factions</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://thehytaleservers.org/types/ftb" title="Hytale FTB Servers"
                                        itemprop="url">
                                        <span itemprop="name">FTB</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://thehytaleservers.org/types/hardcore"
                                        title="Hytale Hardcore Servers" itemprop="url">
                                        <span itemprop="name">Hardcore</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://thehytaleservers.org/types/kitpvp" title="Hytale KitPvP Servers"
                                        itemprop="url">
                                        <span itemprop="name">KitPvP</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://thehytaleservers.org/types/mcmmo" title="Hytale MCMMO Servers"
                                        itemprop="url">
                                        <span itemprop="name">MCMMO</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://thehytaleservers.org/types/minigames"
                                        title="Hytale Mini Games Servers" itemprop="url">
                                        <span itemprop="name">Mini Games</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://thehytaleservers.org/types/parkour" title="Hytale Parkour Servers"
                                        itemprop="url">
                                        <span itemprop="name">Parkour</span>
                                    </a>
                                </li>
                                <li class="footer">
                                    <a href="#" title="All Hytale servers types list | TheHytaleServers.org"
                                        itemprop="url">
                                        <strong itemprop="name">All Types</strong>
                                    </a>
                                </li>
                            </ul>
                            <ul class="eight wide column typesList">
                                <li class="header">
                                    <strong>Servers By Country</strong>
                                </li>
                                <li>
                                    <img class="lazyImg"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12P4zwAAAgEBAKrChTYAAAAASUVORK5CYII="
                                        data-src="{{asset('img/flagpngs/us.png')}}" width="16" height="11"
                                        alt="Hytale Servers in United States">
                                    <a href="#" itemprop="url" title="Hytale Servers in United States">
                                        <span itemprop="name">United States</span>
                                    </a>
                                </li>
                                <li>
                                    <img class="lazyImg"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12P4zwAAAgEBAKrChTYAAAAASUVORK5CYII="
                                        data-src="{{asset('img/flagpngs/gb.png')}}" width="16" height="11"
                                        alt="Hytale Servers in United Kingdom">
                                    <a href="#" itemprop="url" title="Hytale Servers in United Kingdom">
                                        <span itemprop="name">United Kingdom</span>
                                    </a>
                                </li>
                                <li>
                                    <img class="lazyImg"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12P4zwAAAgEBAKrChTYAAAAASUVORK5CYII="
                                        data-src="{{asset('img/flagpngs/ca.png')}}" width="16" height="11"
                                        alt="Hytale Servers in Canada">
                                    <a href="#" itemprop="url" title="Hytale Servers in Canada">
                                        <span itemprop="name">Canada</span>
                                    </a>
                                </li>
                                <li>
                                    <img class="lazyImg"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12P4zwAAAgEBAKrChTYAAAAASUVORK5CYII="
                                        data-src="{{asset('img/flagpngs/de.png')}}" width="16" height="11"
                                        alt="Hytale Servers in Germany">
                                    <a href="#" itemprop="url" title="Hytale Servers in Germany">
                                        <span itemprop="name">Germany</span>
                                    </a>
                                </li>
                                <li>
                                    <img class="lazyImg"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12P4zwAAAgEBAKrChTYAAAAASUVORK5CYII="
                                        data-src="{{asset('img/flagpngs/au.png')}}" width="16" height="11"
                                        alt="Hytale Servers in Australia">
                                    <a href="#" itemprop="url" title="Hytale Servers in Australia">
                                        <span itemprop="name">Australia</span>
                                    </a>
                                </li>
                                <li>
                                    <img class="lazyImg"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12P4zwAAAgEBAKrChTYAAAAASUVORK5CYII="
                                        data-src="{{asset('img/flagpngs/nl.png')}}" width="16" height="11"
                                        alt="Hytale Servers in Netherlands">
                                    <a href="#" itemprop="url" title="Hytale Servers in Netherlands">
                                        <span itemprop="name">Netherlands</span>
                                    </a>
                                </li>
                                <li>
                                    <img class="lazyImg"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12P4zwAAAgEBAKrChTYAAAAASUVORK5CYII="
                                        data-src="{{asset('img/flagpngs/es.png')}}" width="16" height="11"
                                        alt="Hytale Servers in Spain">
                                    <a href="#" itemprop="url" title="Hytale Servers in Spain">
                                        <span itemprop="name">Spain</span>
                                    </a>
                                </li>
                                <li>
                                    <img class="lazyImg"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12P4zwAAAgEBAKrChTYAAAAASUVORK5CYII="
                                        data-src="{{asset('img/flagpngs/fr.png')}}" width="16" height="11"
                                        alt="Hytale Servers in France">
                                    <a href="#" itemprop="url" title="Hytale Servers in France">
                                        <span itemprop="name">France</span>
                                    </a>
                                </li>
                                <li>
                                    <img class="lazyImg"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12P4zwAAAgEBAKrChTYAAAAASUVORK5CYII="
                                        data-src="{{asset('img/flagpngs/se.png')}}" width="16" height="11"
                                        alt="Hytale Servers in Sweden">
                                    <a href="#" itemprop="url" title="Hytale Servers in Sweden">
                                        <span itemprop="name">Sweden</span>
                                    </a>
                                </li>
                                <li>
                                    <img class="lazyImg"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12P4zwAAAgEBAKrChTYAAAAASUVORK5CYII="
                                        data-src="{{asset('img/flagpngs/dk.png')}}" width="16" height="11"
                                        alt="Hytale Servers in Denmark">
                                    <a href="#" itemprop="url" title="Hytale Servers in Denmark">
                                        <span itemprop="name">Denmark</span>
                                    </a>
                                </li>
                                <li class="footer">
                                    <a href="#" title="All Hytale servers countries list | TheHytaleServers.org"
                                        itemprop="url">
                                        <strong itemprop="name">All Countries</strong>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="eight wide column">
                        <form class="ui form" action="#" method="post">
                            <div class="ui input width100">
                                <input id="keyword" type="text" name="keyword" placeholder="Enter Keyword..."
                                    minlength="5" maxlength="50" aria-label="Hytale Servers Search Input" required="">
                            </div>
                            <div class="equal width fields">
                                <div class="field">
                                    <select name="category" aria-label="Hytale Servers Search Categories" required="">
                                        <option value="" selected="selected">Search By...</option>
                                        <option value="1">Server Name</option>
                                        <option value="2">Server IP</option>
                                        <option value="3">Server Description</option>
                                        <option value="4">Server Country</option>
                                        <option value="5">Server Type</option>
                                    </select>
                                </div>
                                <div class="field mbZero">
                                    <button class="ui button submit width100" type="submit"
                                        name="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>-->
        <a href="" title="Hytale Servers, Hytale Server List - TheHytaleServers">
            <h1 class="projectName">
                <img src="{{asset('img/logo.png')}}" width="42" height="45" class="logoIco"
                     alt="{{config('app.name','Laravel')}} Listing"> {{config('app.name','Laravel')}}
            </h1>
        </a>
