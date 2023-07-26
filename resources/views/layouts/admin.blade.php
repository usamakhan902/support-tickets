<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/html/vertical-dark-menu/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jun 2023 13:41:58 GMT -->

@include('admin.include.head')

<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    @include('admin.include.header')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('admin.include.sidebar')

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            @yield('main_content')
            @include('admin.include.footer')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    @include('admin.include.footer_scripts')

</body>

<!-- Mirrored from designreset.com/cork/html/vertical-dark-menu/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jun 2023 13:42:47 GMT -->

</html>
