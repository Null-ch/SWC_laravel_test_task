<?php

namespace App\Http\Controllers\Admin\Event;


use App\Models\User;
use App\Models\Events;
use App\Models\EventsUsers;
use Illuminate\Console\Scheduling\Event;
use App\Http\Controllers\Admin\Event\BaseController;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $events = Events::all();
        $id = auth()->user()->id;
        $user = User::find($id);
        $myEventsIds = EventsUsers::where('user_id', '=', auth()->user()->id)->get()->pluck('event_id');
        $myEvents = Events::find($myEventsIds);
        $members = User::all();
        return view('admin.event.create', compact('events', 'members', 'myEvents'));  
    }
}
