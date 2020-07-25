@extends('layouts.app')
@section('content')
    <div class="mx-auto lg:mt-8 mt-16 text-left">
        <div class="flex flex-col">
            <div class="font-semibold bg-gray-700 text-gray-300 py-3 px-6 mb-0 shadow-md">
                {{ __('Login') }}
            </div>

            <form class="bg-gray-800 text-gray-200 shadow-md px-8 pt-6 pb-8 mb-4" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="email">
                        {{ __('E-Mail Address ') }}
                    </label>
                    <input class="shadow appearance-none border @error('email') border-red-500 @enderror rounded w-full py-2 px-3 leading-tight text-gray-900 focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="E-Mail" name="email" required>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-bold mb-2" for="password">
                        {{ __('Password') }}
                    </label>
                    <input class="shadow appearance-none border @error('password') border-red-500 @enderror rounded w-full py-2 px-3 mb-3 leading-tight text-gray-900 focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="*******" name="password" required>
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <input type="submit" class="cusor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="Log in">
                    <div class="inline-grid font-bold text-xs text-blue-500">
                        <a href="{{ route('register') }}" class="hover:text-blue-800">Register</a>
                        <a href="{{ route('password.request') }}" class="hover:text-blue-800">Forgot your password ?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
