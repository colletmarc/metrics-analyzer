<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500&display=swap" rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-900 w-full">
<div id="app">
    <header>
        <nav class="flex items-center justify-between flex-wrap bg-gray-800 p-3 shadow-lg">
            <div class="flex items-center flex-shrink-0 text-white mr-12">
                <span class="font-semibold text-xl tracking-tight">
                    <a href="{{ route('apps.index') }}">{{ config('app.name') }}</a>
                </span>
            </div>
            <div class="block lg:hidden">
                <button class="flex items-center px-3 py-2 rounded text-gray-200 appearance-none leading-none" id="burger">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title></title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            <div class="w-full hidden flex-grow lg:flex lg:items-center lg:w-auto uppercase text-xs" id="menu-nav">
                <div class="lg:flex-grow">
                    <a href="{{ route('apps.index') }}" class="block lg:inline-block lg:mt-0 text-gray-200 hover:text-white mt-4 px-3">
                        {{ __('Apps') }}
                    </a>
                </div>
                @guest
                    <div>
                        <a href="{{ route('login') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-500 hover:bg-white mt-4 lg:mt-0">
                            {{ __('Login') }}
                        </a>
                    </div>
                @else
                    <div class="font-bold lg:block inline-block">
                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="inline-block w-auto px-4 py-2 leading-none border rounded text-red-600 border-red-700 uppercase">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                @endif
            </div>
        </nav>
    </header>

    <div class="block w-full p-3 lg:w-2/3 lg:p-0 mx-auto text-center justify-center">
        @include('layouts.message', ['messages' => ($errors->all() ?? [])])
        @yield('content')
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#burger").click(function () {
            if ($("#menu-nav").hasClass("hidden")) {
                $("#menu-nav").removeClass("hidden");
            } else {
                $("#menu-nav").addClass("hidden");
            }
        });
    })
</script>
</body>
</html>
