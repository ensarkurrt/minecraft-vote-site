@extends('layouts.master')

@section('title','Kayıt Ol')

@section('content')
    <div class="ui segments enchanced maZer">
        <div class="ui stackable grid loggy">
            <div class="eight wide column left">
                <form class="ui form" action="{{ route('auth.register.post') }}" method="post">
                    @csrf
                    <div class="field">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username" maxlength="16" required="">
                    </div>
                    <div class="field">
                        <label>
                            Email
                            <input type="email" name="email" placeholder="Email" maxlength="100":value="old('email')" required
                                   autofocus>
                        </label>
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" required="">
                    </div>
                    <div class="field">
                        <label>Confirm Password</label>
                        <input type="password" name="cn-password" placeholder="Confirm Password" required="">
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" tabindex="0" name="agreement" class="hidden">
                            <label>I agree to the <a href="https://thehytaleservers.org/terms">Terms of Service</a></label>
                        </div>
                    </div>


                    <button class="ui button submit" type="submit" name="submit">Register</button>


                    @if (isset($error))
                        <div class="ui error message">
                            <i class="close icon"></i>
                            <div class="header">Hata</div>
                            <p> {{ $error }}</p>
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>



    {{--<form method="POST" action="{{ route('auth.register.post') }}">


        <div>
            <input for="email" value="{{ __('Email') }}"/>
            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         autofocus/>
        </div>

        <div class="mt-4">
            <input for="password" value="{{ __('Password') }}"/>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required
                         autocomplete="current-password"/>
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <x-jet-checkbox id="remember_me" name="remember"/>
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
