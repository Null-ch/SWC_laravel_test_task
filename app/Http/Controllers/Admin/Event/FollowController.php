<?php

namespace App\Http\Controllers\Admin\Event;


use App\Models\User;
use App\Models\Events;
use App\Http\Controllers\Admin\Event\BaseController;
use App\Models\EventsUsers;

class FollowController extends BaseController
{
    public function __invoke(Events $event, User $user)
    {
        $user = auth()->user()->id;
        $event = $event->id;
        EventsUsers::firstOrCreate([
            'user_id' => $user,
            'event_id' => $event,
        ]);
        $events = Events::all();
        $myEventsIds = EventsUsers::where('user_id', '=', auth()->user()->id)->get()->pluck('event_id');
        $myEvents = Events::find($myEventsIds);
        return view('admin.event.index', compact('events', 'myEvents'));
    }
}
