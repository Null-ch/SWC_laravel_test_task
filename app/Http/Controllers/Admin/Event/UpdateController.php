<?php

namespace App\Http\Controllers\Admin\Event;


use App\Models\Events;
use App\Http\Requests\Admin\Events\UpdateRequest;
use App\Http\Controllers\Admin\Event\BaseController;
use App\Models\EventsUsers;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Events $event)
    {
        $data = $request->validated();
        $event = $this->service->update($data, $event);
       
        return redirect(route('admin.event.index'));
    }
}