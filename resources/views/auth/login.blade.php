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

                    {{--   @if (isset($error))
                               <div class="ui error message">
                                   <i class="close icon"></i>
                                   <div class="header">Hata</div>
                                   <p> {{ $error }}</p>
            </div>
            @endif--}}

                </form>
            </div>
        </div>
    </div>



    {{--<form method="POST" action="{{ route('auth.register.post') }}">


    <div>
        <input for="email" value="{{ __('Email') }}" />
        <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
    </div>

    <div class="mt-4">
        <input for="password" value="{{ __('Password') }}" />
        <input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="current-password" />
    </div>

    <div class="block mt-4">
        <label for="remember_me" class="flex items-center">
            <x-jet-checkbox id="remember_me" name="remember" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        --}}{{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
        </a>
        @endif--}}{{--

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
        </x-jet-button>
    </div>
    </form>--}}
@endsection
