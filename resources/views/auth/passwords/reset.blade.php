@extends('layouts.app')
@section('content')
    <div class="mx-auto lg:mt-8 mt-16 text-left">
        <div class="flex flex-col">
            <div class="font-semibold bg-gray-700 text-gray-300 py-3 px-6 mb-0 shadow-md rounded-t">
                {{ __('Password reset') }}
            </div>
            <form class="bg-gray-800 text-gray-800 shadow-md px-8 pt-6 pb-8 mb-4" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="flex flex-wrap mb-6">
                    <label for="email" class="block text-gray-200 text-sm font-bold mb-2">
                        {{ __('E-Mail Address') }}:
                    </label>
                    <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6">
                    <label for="password" class="block text-gray-200 text-sm font-bold mb-2">
                        {{ __('Password') }}:
                    </label>
                    <input id="password" type="password" class="form-input w-full @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6">
                    <label for="password-confirm" class="block text-gray-200 text-sm font-bold mb-2">
                        {{ __('Password (checking)') }}:
                    </label>
                    <input id="password-confirm" type="password" class="form-input w-full" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="flex flex-wrap">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-gray-100 font-bold  py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Confirm') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
