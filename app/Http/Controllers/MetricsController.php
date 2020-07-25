<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\View\View;
use App\Services\Message\MessageService;

class MetricsController extends Controller
{
    /**
     * @var \App\Services\Message\MessageService
     */
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index(App $app): View
    {
        dd($app);
    }
}
