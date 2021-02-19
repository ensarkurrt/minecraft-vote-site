@extends('layouts.master')

@section('title','Üyelik Sözleşmesi')

@section('content')
<div class="ui segments enchanced maZer">
    <div class=" stackable" style="padding: 5%">
        <div class="eight wide column ">
            {!! $terms !!}
        </div>
    </div>
</div>

@endsection
