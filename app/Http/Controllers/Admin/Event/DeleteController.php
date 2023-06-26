<?php

namespace App\Http\Controllers\Admin\Event;


use App\Http\Controllers\Admin\Event\BaseController;
use App\Models\Events;

class DeleteController extends BaseController
{
    public function __invoke(Events $event)
    {
        $event->delete();
        return redirect()->route('admin.event.index');
    }
}
