@extends('layouts.master')

@section('title','İletişim')
@section('page_desc')
@section('content')
    <h2 class="section-title"> @yield('title') </h2>
    <div class="ui segments maZer">
        <form class="ui tall stacked segment form" action="#" method="post">
            <div class="field">
                <label>Adınız</label>
                <input type="text" name="name" placeholder="Adınız" required="">
            </div>
            <div class="field">
                <label>E-Posta</label>
                <input type="email" name="email" placeholder="E-Posta" required="">
            </div>
            <div class="field">
                <label>Mesaj</label>
                <textarea rows="4" name="message" placeholder="Mesaj" required=""></textarea>
            </div>
       {{--     <div class="field">
                <img id="captcha" src="/captcha.png" width="160" height="45" border="1" style="width: 100%; height: auto; max-width: 200px; display: block; margin-bottom: .5em">
                <a href="#" onclick="document.getElementById('captcha').src = '/captcha.png?' + Math.random(); document.getElementById('imageVerification').value = ''; return false;">
                    Refresh Image
                </a>
            </div>
            <div class="field">
                <input type="text" name="captcha" placeholder="Captcha" maxlength="8" required="">
            </div>--}}
            <button class="ui button submit" type="submit" name="submit">Submit</button>
        </form>
    </div>
@stop
{{-- <div class="required_content bottom">
    <center>Advertisement</center>
</div> --}}
