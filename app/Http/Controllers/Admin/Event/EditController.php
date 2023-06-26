<?php

namespace App\Http\Controllers\Admin\Event;


use App\Models\Events;
use App\Models\EventsUsers;
use App\Http\Controllers\Admin\Event\BaseController;

class EditController extends BaseController
{
    public function __invoke(Events $event)
    {
        $events = Events::all();
        $myEventsIds = EventsUsers::where('user_id', '=', auth()->user()->id)->get()->pluck('event_id');
        $myEvents = Events::find($myEventsIds);
        return view('admin.event.edit', compact('event', 'events', 'myEvents'));  
    }
}
