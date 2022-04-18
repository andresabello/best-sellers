@inject('theme', 'App\Services\ThemeService')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ $theme->findAsset('app.css') }}" rel="stylesheet" type="text/css">

    <title>{{config('app.name')}}</title>
</head>
<body class="antialiased">
<div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
<div id="app">
    <div class="row">
        <div class="col-xl-8 offset-xl-2 ">
            <h1 class="text-center my-5">NYT Best Sellers</h1>
        </div>
    </div>
    <books></books>
</div>
<script src="{{ $theme->findAsset('runtime.js') }}"></script>
<script src="{{ $theme->findAsset('app.js') }}"></script>
@stack('scripts')
</body>
</html>
