<!DOCTYPE html>
<html lang="en">

@include('web.includes.head')

<body>
    <div class="overlay"></div>
    <!-- bavbar start -->
    @include('web.includes.herader')

    @yield('content')
    <!-- navbar-end -->

    @include('web.includes.footer')
    <!-- footer end -->
</body>

</html>
@yield('custom_scripts')
