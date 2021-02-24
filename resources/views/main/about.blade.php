@extends('layouts.master')

@section('title','Hakkımızda')

@section('content')
    {{-- <div class="ui segments enchanced ">
         <div class=" stackable" style="padding: 5%">
             <div class="eight wide column ">
                 {!! $terms !!}
             </div>
         </div>
     </div>
 --}}
    <div class="ui segments">
        <div class="ui segment default-color header">
            <i class="clipboard icon"></i> Hakkımızda
        </div>
        <div class="ui tall stacked segment form">{!! $about !!}</div>
    </div>

@endsection
