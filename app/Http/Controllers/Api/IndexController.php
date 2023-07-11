<?php

namespace App\Http\Controllers\Api;


use App\Models\Events;
use App\Models\EventsUsers;
use App\Http\Controllers\API\BaseController;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $events = Events::all();
        $myEventsIds = EventsUsers::where('user_id', '=', auth()->user()->id)->get()->pluck('event_id');
        $myEvents = Events::find($myEventsIds);

        if (!$events) return response(['errors' => 'События отсутствуют'], 404);
        return ['errors' => null,'Все события' => $events, 'Мои события' => $myEvents];
    }
}
