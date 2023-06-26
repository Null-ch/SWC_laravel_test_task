<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Models\Events;
use App\Models\EventsUsers;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $events = Events::all();
        $myEventsIds = EventsUsers::where('user_id', '=', auth()->user()->id)->get()->pluck('event_id');
        $myEvents = Events::find($myEventsIds);
        return view('admin.user.edit', compact('user', 'events', 'myEvents'));  
    }
}
