@extends('layouts.master')

@section('title','Kontrol Paneli')
@section('content')
    <div class="ui stackable grid ">
        <div class="row">
            @include('cp.layouts.leftbar')
            @include('cp.layouts.rightbar')
        </div>
    </div>
@endsection


