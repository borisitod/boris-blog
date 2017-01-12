<!DOCTYPE html>
<html lang="en">

<head>

    @yield('head')

</head>

<body>

{{--@include('partials._nav-frontend')--}}
@yield('nav')
@yield('header')

<!-- Main Content -->
<div class="container">
    @include('partials._messages')
    @yield('content')
</div>

<hr>

<!-- Footer -->
<footer>
    @include('partials._footer-frontend')
</footer>


@include('partials._javascript')
@yield('scripts')

</body>

</html>
