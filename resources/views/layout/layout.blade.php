<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="{{ app()->getLocale() }}"> <!--<![endif]-->
@include('layout.head')

<body data-spy="scroll" data-target=".navbar-collapse">
<!-- Preloader -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
        </div>
    </div>
</div>


<div class="culmn">
    <!--Home page style-->


    <nav class="navbar navbar-default bootsnav navbar-fixed black no-background">
        <!-- Start header nav -->
    @include('layout.header')
    <!-- end header nav -->

        <!-- Start Side Menu -->
    @include('layout.side_bar')
    <!-- End Side Menu -->
    </nav>

@yield('content')
    {{--@include('layout.hidden')--}}
</div>
@include('layout.script')
</body>

</html>
