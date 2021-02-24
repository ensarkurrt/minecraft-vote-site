@if (session('success'))
    <div class="ui success message">
        <i class="close icon"></i>
        <div class="header"></div>
        <p>{{ session('success') }}</p>
    </div>
@endif
