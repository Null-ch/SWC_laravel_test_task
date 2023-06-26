<?php

namespace App\Http\Controllers\Admin\Event;



use App\Models\Events;
use App\Models\EventsUsers;
use App\Http\Requests\Admin\Events\StroreRequest;
use App\Http\Controllers\Admin\Event\BaseController;

class StoreController extends BaseController
{
    public function __invoke(StroreRequest $request)
    {
        $data = $request->validated();
        $event = Events::firstOrCreate($data);
        $userId = auth()->user()->id;
        $eventId = $event->id;

        EventsUsers::firstOrCreate([
            'user_id' => $userId,
            'event_id' => $eventId,
        ]);
        return redirect()->route('admin.event.index');
    }
}
