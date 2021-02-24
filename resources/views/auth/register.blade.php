@extends('layouts.master')

@section('title','Kayıt Ol')

@section('content')
    <div class="ui segments enchanced">
        <h2 class="section-title"> @yield('title') </h2>
        <div class="ui stackable grid loggy">
            <div class="eight wide column left">
                <form class="ui form" action="{{ route('register') }}" method="post">
                    @csrf


                    <div class="field">
                        <label>Kullanıcı Adı</label>
                        <input type="text" name="username" placeholder="Kullanıcı Adı" maxlength="20"
                               value="{{old('username')}}"
                               required autofocus>
                    </div>
                    <div class="field">
                        <label>
                            E-Posta
                            <input type="email" name="email" placeholder="E-Posta" maxlength="100"
                                   value="{{old('email')}}"
                                   required>
                        </label>
                    </div>
                    <div class="field">
                        <label>Şifre</label>
                        <input type="password" name="password" placeholder="Şifre" required=""
                               autocomplete="new-password">
                    </div>
                    <div class="field">
                        <label>Tekrar Şifre</label>
                        <input type="password" name="password_confirmation" placeholder="Tekrar Şifre" required=""
                               autocomplete="new-password">
                    </div>

                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" tabindex="0" name="terms" class="hidden">
                            <label><a href="{{route('terms.show')}}">Üyelik Sözleşmesi'ni</a> okudum kabul
                                ediyorum.</label>
                        </div>
                    </div>


                    <button class="ui button submit" type="submit" name="submit">Kayıt Ol</button>

                    @component('components.alert.status-alert')@endcomponent
                    @component('components.alert.validation-alert')@endcomponent

                </form>
            </div>
        </div>
    </div>
@endsection
