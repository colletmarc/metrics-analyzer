@extends('layouts.app')

@section('content')
    <div class="w-full mt-8 min-h-screen text-gray-200">
        <h2 class="text-2xl font-bold text-center text-gray-200 mb-12">
            {{ __('App list') }}
        </h2>
        <div class="lg:flex lg:mx-6 px-3 items-center mb-4 mt-8">
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">{{ __('Name') }}</th>
                        <th class="px-4 py-2">{{ __('Host') }}</th>
                        <th class="px-4 py-2">{{ __('Endpoint') }}</th>
                        <th class="px-4 py-2"></th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                @foreach($apps as $app)
                    <tbody>
                        <tr>
                            <td class="border px-10 py-4">{{ $app->name }}</td>
                            <td class="border px-10 py-4">{{ $app->host }}</td>
                            <td class="border px-10 py-4">{{ $app->metrics_endpoint }}</td>
                            <td class="border px-10 py-4">
                                <a href="{{ route('apps.edit', $app->id) }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-500 hover:bg-white mt-4 lg:mt-0" >
                                    {{ __('Edit') }}
                                </a>
                            </td>
                            <td class="border px-10 py-4">
                                <a href="{{ route('metrics.index', $app->id) }}"  >
                                    {{ __('Metrics') }}
                                </a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <div class="lg:mx-12 px-3 mt-10">
            <a href="{{ route('apps.create') }}" class="border-gray-700 block lg:w-1/2 mx-auto w-full bg-white hover:bg-grey-600 rounded-lg py-3 px-4 mb-4 uppercase font-bold tracking-wide focus:outline-none text-gray-900">
                {{ __('Create') }}
            </a>
        </div>
    </div>
@endsection
