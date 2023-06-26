<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\EventsUsers;
use Illuminate\Console\Scheduling\Event;

class IndexController extends Controller
{
    public function __invoke()
    {
        $events = Events::all();
        $id = auth()->user()->id;
        $users = User::all();
        $user = User::find($id);
        $myEventsIds = EventsUsers::where('user_id', '=', auth()->user()->id)->get()->pluck('event_id');
        $myEvents = Events::find($myEventsIds);
        return view('admin.user.show', compact('users', 'events', 'myEvents', 'user'));  
    }
}
