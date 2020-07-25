@extends('layouts.app')

@section('content')
    <div class="w-full mt-8 min-h-screen text-gray-200">
        <h2 class="text-2xl font-bold text-center text-gray-200 mb-8">
            {{ $app->name }}
        </h2>
        <form method="post" action="{{ route('apps.update', $app->id) }}">
            @csrf
            <div class="lg:flex lg:mx-6 px-3 items-center mb-4 mt-8">
                <div class="lg:w-1/3">
                    <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="app_name">{{ __('Name') }}</label>
                    <input class="appearance-none block w-full bg-gray-800 border border-gray-700 lg:rounded-l-lg lg:rounded-r-none rounded-lg py-3 px-4 mb-4 focus:outline-none" id="app_name" value="{{ $app->name }}" name="name">
                </div>
                <div class="lg:w-1/3">
                    <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="app_host">{{ __('Host') }}</label>
                    <input class="appearance-none block w-full bg-gray-800 border border-gray-700 lg:rounded-r-none lg:rounded-l-none rounded-lg py-3 px-4 mb-4 focus:outline-none" id="app_host" value="{{ $app->host }}" name="host">
                </div>
                <div class="lg:w-1/3">
                    <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="app_endpoint">{{ __('Metrics Endpoint') }}</label>
                    <input class="appearance-none block w-full bg-gray-800 border border-gray-700 lg:rounded-r-lg lg:rounded-l-none rounded-lg py-3 px-4 mb-4 focus:outline-none" id="app_endpoint" value="{{ $app->metrics_endpoint }}" name="endpoint">
                </div>
            </div>
            <div class="lg:mx-12 px-3">
                <input class="border-gray-700 block lg:w-1/2 mx-auto w-full bg-grey-700 hover:bg-grey-600 rounded-lg py-3 px-4 mb-4 uppercase font-bold tracking-wide focus:outline-none text-gray-900 cursor-pointer" value="Update" type="submit">
            </div>
        </form>
        <form method="post" action="{{ route('apps.delete', $app->id) }}">
            <div class="lg:mx-12 px-3">
                <input class="border-gray-700 block lg:w-1/2 mx-auto w-full bg-red-700 hover:bg-red-600 rounded-lg py-3 px-4 mb-4 uppercase font-bold tracking-wide focus:outline-none text-gray-900 cursor-pointer" value="Delete" type="submit">
            </div>
        </form>
    </div>
@endsection
