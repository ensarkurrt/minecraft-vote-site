@extends('layouts.master')

@section('title','Giriş Yap')

@section('content')
    <div class="ui segments enchanced">
        <h2 class="section-title"> @yield('title') </h2>
        <div class="ui stackable grid loggy">
            <div class="eight wide column left">
                <form class="ui form" action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="field">
                        <label>
                            Kullanıcı Adı
                            <input type="text" name="username" placeholder="Kullanıcı Adı" maxlength="20"
                                   value="{{ old('username') }}"
                                   required autofocus>
                        </label>
                    </div>
                    <div class="field">
                        <label>Şifre</label>
                        <input type="password" name="password" placeholder="Şifre" required=""
                               autocomplete="current-password">
                    </div>
                    <div class="field">
                        <p><a href="{{ route('password.request') }}">Şifremi unuttum?</a></p>
                    </div>

                    <button class="ui button submit" type="submit" name="submit">Giriş Yap</button>
                    @component('components.alert.status-alert')@endcomponent
                    @component('components.alert.validation-alert')@endcomponent
                </form>
            </div>
        </div>
    </div>
@endsection
