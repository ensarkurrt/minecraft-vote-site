@extends('layouts.master')

@section('title','Şifremi Unuttum')

@section('content')
    <div class="ui segments enchanced maZer">
        <div class="ui stackable grid loggy">
            <div class="eight wide column left">
                <form class="ui form" action="{{ route('password.email') }}" method="post">
                    @csrf
                    
                    <div class="field">
                        <label>
                            E-Posta
                            <input type="email" name="email" placeholder="E-Posta" maxlength="100"
                                   value="{{ old('email') }}" required
                                   autofocus>
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
