@extends('layouts.master')

@section('title','Şifremi Unuttum')

@section('content')
    <div class="ui segments enchanced maZer">
        <div class="ui stackable grid loggy">
            <div class="eight wide column left">
                <form class="ui form" action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="field">
                        <label>
                            E-Posta
                            <input type="email" name="email" placeholder="E-Posta" maxlength="100"
                                   value="{{ old('email', $request->email) }}" required
                                   autofocus>
                        </label>
                    </div>

                    <div class="field">
                        <label>
                            Yeni şifre
                            <input type="password" name="password" required autocomplete="new-password">
                        </label>
                    </div>

                    <div class="field">
                        <label>
                            Yeni şifre tekrar
                            <input type="password" name="password_confirmation" required autocomplete="new-password">
                        </label>
                    </div>

                    <button class="ui button submit" type="submit" name="submit">Şifremi sıfırla</button>
                    @component('components.alert.status-alert')@endcomponent
                    @component('components.alert.validation-alert')@endcomponent
                </form>
            </div>
        </div>
    </div>

@endsection

