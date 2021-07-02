<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="{{ config('app.seo_meta_title') }}">
        <meta name="keywords" content="{{ config('app.seo_meta_description') }}">
        <meta name="author" content="AIT ELAHMADI Farah">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title') - {{ config('app.name') }}</title>
        @include('site.partials.styles')
    </head>
    <body>
        @include('site.partials.header')
        @yield('content')
        <div id="myDiv"></div>
        @include('site.partials.footer')
        @include('site.partials.scripts')
    </body>
</html>
