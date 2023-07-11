<?php

namespace App\Http\Controllers\Api;



use App\Models\Events;
use App\Models\EventsUsers;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\Api\Events\StroreRequest;

class StoreController extends BaseController
{
    public function __invoke(StroreRequest $request)
    {
        $data = $request->validated();
        $userId = auth()->user()->id;
        $data['creator_id'] = $userId;
        $event = Events::firstOrCreate($data);
        $userId = auth()->user()->id;
        $eventId = $event->id;

        EventsUsers::firstOrCreate([
            'user_id' => $userId,
            'event_id' => $eventId,
        ]);
       
        return ['message' => 'Событие успешно создано!', 'Событие' => $event];
    }
}
