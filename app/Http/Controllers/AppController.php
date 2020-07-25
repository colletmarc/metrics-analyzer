<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AppController extends Controller
{
    public function index(): View
    {
        $apps = App::all();

        return view('apps.index', compact('apps'));
    }

    public function create(): View
    {
        return view('apps.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $app = new App($request->except('_token'));

        $app->save();

        return redirect()->route('apps.edit', $app->id);
    }

    public function edit(App $app): View
    {
        return view('apps.edit', compact('app'));
    }

    public function update(Request $request, App $app): RedirectResponse
    {
        $app->update($request->except(['_token', 'method']));

        return redirect()->route('apps.edit', $app->id);
    }

    public function delete(App $app)
    {
        $app->delete();

        return redirect()->route('apps.index');
    }
}
