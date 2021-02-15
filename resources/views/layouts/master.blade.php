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

<h2 class="section-title"> @yield('title') </h2>

@yield('content')

<div class="ui stackable grid newsFeed">
    <br>
    {{--  <div class="eight wide column">
         <div class="section-title">
             Hytale Blogs, News &amp; Updates
         </div>
         <table class="ui unstackable table">
             <thead>
                 <tr>
                     <th class="default-color">Hytale Blogs, News &amp; Updates</th>
                 </tr>
             </thead>
             <tbody>
                 <tr>
                     <td>
                         <h4 class="server-name">
                             <a href="https://thehytaleservers.org/blog/hytale-market-guide-complete.id15"
                                 title="INVESTIGATING THE HYTALE MARKET (SPECULATION) | Hytale Blog">INVESTIGATING
                                 THE HYTALE MARKET (SPECULATION)</a>
                         </h4>
                         <p>
                             We predict why and how Hytale will have a big if not the biggest marketplace in
                             gaming history.
                             Do you want to get a Hytale account and play, right now? So do I. It’s
                             unfortunate that we can’t have this sort of luxury right now. SEO keyword
                             manipulation out of the way,... [<a
                                 href="https://thehytaleservers.org/blog/hytale-market-guide-complete.id15"
                                 title="INVESTIGATING THE HYTALE MARKET (SPECULATION) | Read Full Hytale Blog">Read
                                 More</a>] </p>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <h4 class="server-name">
                             <a href="https://thehytaleservers.org/blog/what-hytale-server-hosting-to-choose.id14"
                                 title="WHAT HYTALE HOSTING SHOULD YOU CHOOSE? | Hytale Blog">WHAT HYTALE
                                 HOSTING SHOULD YOU CHOOSE?</a>
                         </h4>
                         <p>
                             Creating a minecraft server is easy. Hosting a minecraft server 24/7 is not. It
                             will be the same with Hytale, you cannot doubt it. However, there are multiple
                             services called hytale hosting services.
                             They (Hytale hosting providers) host your hytale server at a small (and... [<a
                                 href="https://thehytaleservers.org/blog/what-hytale-server-hosting-to-choose.id14"
                                 title="WHAT HYTALE HOSTING SHOULD YOU CHOOSE? | Read Full Hytale Blog">Read
                                 More</a>] </p>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <h4 class="server-name">
                             <a href="" title="HOW TO OPEN HYTALE SERVER? | Hytale Blog">HOW TO OPEN HYTALE
                                 SERVER?</a>
                         </h4>
                         <p>
                             In this article we are talking about how to open Hytale servers. How to maintain
                             them and prepare for success. </p>
                     </td>
                 </tr>
             </tbody>
             <tfoot>
                 <tr>
                     <td>
                         <a class="ui fluid button defaultButton" href="https://thehytaleservers.org/blog"
                             title="Full list of Hytale Game News">More Hytale Content (12)</a>
                     </td>
                 </tr>
             </tfoot>
         </table>
     </div>
     <div class="eight wide column">
         <article>
             <h4 class="ui medium header">What are Hytale Servers?</h4>
             <p>
                 To get the most out of Hytale, you will need to get into the <i>Hytale servers</i>. You
                 don’t have to struggle too much to locate the best <a href="https://thehytaleservers.org"
                     title="Hytale Servers | Hytale Server List">Hytale servers</a>. We have done the hard
                 work for you and you will be able to get your hands on the best Hytale servers as a result
                 of it. All you have to do is to take a look at the top <strong>Hytale server list</strong>
                 that is available on our website.
             </p>
             <h4 class="ui medium header">Why to Use Hytale Servers List?</h4>
             <p>
                 The <i>Hytale servers</i> list offered by our website will never disappoint you. That’s
                 because we guarantee you to get an outstanding experience with the list of servers that we
                 offer. Hence, our Hytale listing has become extremely popular among players out there in the
                 world as well.
             </p>
             <h4 class="ui medium header">What is Hytale Game?</h4>
             <p>
                 Hytale is a game, which is designed uniquely for modding. Therefore, all the server
                 operators will be provided with the opportunity to create new aspects and customize the
                 existing aspects of the game. They include everything from game mechanics to environments.
                 In addition, a part of the game UI can also be customized.
             </p>
             <p>
                 The <i>Hytale server list</i> encourages all players to start building upon from what the
                 content creators are working on. This can give life to an outstanding gaming experience at
                 the end of the day. Therefore, you will fall in love with the Hytale servers that we offer.
             </p>
         </article>
     </div>--}}
</div>

{{--<hr class="bottom">--}}
</main>

@include('layouts.partials.footer')


</body>



</html>

