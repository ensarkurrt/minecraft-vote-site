@extends('cp.layouts.master')

@section('rightBarContent')
    <form class="ui small form" action="{{route('account.update.username')}}" method="post"
          style="border-radius:.28571429rem;border: 1px solid rgba(34,36,38,.15);margin-bottom:1em;padding:1em">
        <h4 class="ui dividing header">Kullanıcı Adını Değiştir</h4>
        @csrf

        <div class="required field">
            <label>Şifreniz</label>
            <input type="password" name="password" placeholder="Şifreniz" required="">
        </div>
        <div class="required field">
            <label>Kullanıcı Adı</label>
            <input type="text" name="username" placeholder="Kullanıcı Adı" maxlength="20" required="">
        </div>
        <button class="ui button submit" type="submit" name="submit">Güncelle</button>
    </form>


    {{--    <form class="ui small form" action="#" method="post" style="border-radius:.28571429rem;border: 1px solid rgba(34,36,38,.15);margin-bottom:1em;padding:1em">
            <h4 class="ui dividing header">E-Posta Adresini Değiştir</h4>
            @csrf
            <div class="required field">
                <label>Şifreniz</label>
                <input type="password" name="password" placeholder="Şifreniz" required="">
            </div>
            <div class="required field">
                <label>E-Posta</label>
                <input type="email" name="email" placeholder="E-Posta" maxlength="100" required="">
            </div>
            <button class="ui button submit" type="submit" name="submit_two">Güncelle</button>
        </form>--}}

    <form class="ui small form" action="{{route('account.update.password')}}" method="post"
          style="border-radius:.28571429rem;border: 1px solid rgba(34,36,38,.15);padding:1em">
        <h4 class="ui dividing header">Şifre Değiştir</h4>
        @csrf
        <div class="required field">
            <label>Mevcut şifreniz</label>
            <input type="password" name="password" placeholder="Şifreniz" required="">
        </div>
        <div class="required field">
            <label>Yeni şifreniz</label>
            <input type="password" name="new_password" placeholder="Yeni şifre" required="">
        </div>
        <div class="required field">
            <label>Yeni şifreniz tekrar</label>
            <input type="password" name="new_password_again" placeholder="Yeni şifre tekrar" required="">
        </div>
        <button class="ui button submit" type="submit" name="submit_three">Güncelle</button>
    </form>
@endsection


