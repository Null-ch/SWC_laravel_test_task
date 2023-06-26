<?php

namespace App\Http\Controllers\Admin\Event;


use App\Models\User;
use App\Models\Events;
use App\Models\EventsUsers;
use App\Http\Controllers\Admin\Event\BaseController;

class ShowController extends BaseController
{
    public function __invoke(Events $event)
    {
        $user = auth()->user()->id;
        $events = Events::all();
        $myEventsIds = EventsUsers::where('user_id', '=', auth()->user()->id)->get()->pluck('event_id');
        $myEvents = Events::find($myEventsIds);

        $membersId = EventsUsers::where('event_id', '=', $event->id)->get()->pluck('user_id');
        $members = User::find($membersId);
        return view('admin.event.show', compact('myEvents', 'events', 'event', 'user', 'members'));  
    }
}
