<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    @include('layouts.frontend.partials.styles')
</head>
<body>

<div class="wrapper">

    @include('layouts.frontend.partials.nav')
    @yield('content')
    @include('layouts.frontend.partials.footer')

</div>


@include('layouts.frontend.partials.scripts')
</body>
</html>
