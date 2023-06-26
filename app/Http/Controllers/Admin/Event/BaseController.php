<?php

namespace App\Http\Controllers\Admin\Event;

use App\Service\EventService;
use App\Http\Controllers\Controller;



class BaseController extends Controller
{
    public $service;
    public function __construct(EventService $service)
    {
        $this->service = $service;
    }
}
