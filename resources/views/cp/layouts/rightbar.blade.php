<div class="eleven wide stretched column">
    <div class="ui segment">
        <div class="ui warning message">
            <i class="close icon" aria-hidden="true" id="closeBtn"></i>
            <div class="header">Important!</div>
            <p>
            </p><ul style="margin: 0 0 -10px 0!important">
                <li>Hytale is not launched yet. But we allow you to add your server (name, description, country). Once Hytale will be launched we will notify you to add IP and port. Start gaining rankings on google and our listing immediately.</li>
                <li>Auctions for advertisement slots are open. And will stay so until Hytale will be announced. Start bidding, to reserve your advertisement slot now! <i class="smile icon"></i></li>
            </ul>
            <p></p>
        </div>

        {{-- Kullanıcı adını değiştimek --}}

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="ui error message">
                    <i class="close icon"></i>
                    <div class="header"></div>
                    <p>{{ $error }}</p>
                </div>
            @endforeach
        @endif

        @if (session('success'))
            <div class="ui success message">
                <i class="close icon"></i>
                <div class="header"></div>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @yield('rightBarContent')
    </div>
</div>
