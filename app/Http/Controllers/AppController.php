<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(): View
    {
        $apps = App::all();

        return view('apps.index', compact('apps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function edit(App $app): View
    {
        return view('apps.edit', compact('app'));
    }

    public function update(Request $request, App $app)
    {
        //
    }

    public function destroy(App $app)
    {
        //
    }
}
