<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreAppRequest;
use App\Http\Requests\UpdateAppRequest;
use App\Services\Message\MessageService;

class AppController extends Controller
{
    /**
     * @var \App\Services\Message\MessageService
     */
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index(): View
    {
        $apps = App::all();

        return view('apps.index', compact('apps'));
    }

    public function create(): View
    {
        return view('apps.create');
    }

    public function store(StoreAppRequest $request): RedirectResponse
    {
        $app = new App($request->except('_token'));

        $app->save();

        $this->messageService->set('success', 'The app has been created !!');
        return redirect()->route('apps.edit', $app->id);
    }

    public function edit(App $app): View
    {
        return view('apps.edit', compact('app'));
    }

    public function update(UpdateAppRequest $request, App $app): RedirectResponse
    {
        $app->update($request->except(['_token', 'method']));

        $this->messageService->set('success', 'The app has been updated !!');
        return redirect()->route('apps.edit', $app->id);
    }

    public function destroy(App $app)
    {
        $app->delete();

        $this->messageService->set('success', 'The app has been deleted !!');
        return redirect()->route('apps.index');
    }
}
