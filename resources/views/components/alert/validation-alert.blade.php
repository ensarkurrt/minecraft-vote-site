@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="ui error message">
            <i class="close icon"></i>
            <div class="header"></div>
            <p> {{ $error }}</p>
        </div>
    @endforeach
@endif
