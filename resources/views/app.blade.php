@include('layout.header')
<div class="row">
    <div class="col-9">
        @yield('content')
    </div>
    <div class="col-3">
        @include('layout.aside')
    </div>

</div>
@include('layout.footer')
