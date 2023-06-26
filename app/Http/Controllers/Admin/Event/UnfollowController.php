<?php

namespace App\Http\Controllers\Admin\Event;


use App\Models\User;
use App\Models\Events;
use App\Models\EventsUsers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Event\BaseController;

class UnfollowController extends BaseController
{
    public function __invoke(Events $event, User $user)
    {
        $user = auth()->user()->id;
        $event = $event->id;
        $events = Events::all();

        $whereArray = ['user_id' => $user, 'event_id' => $event];
        $query = DB::table('events_users');
            $query->where($whereArray);
            $query->delete();
        
        $myEventsIds = EventsUsers::where('user_id', '=', auth()->user()->id)->get()->pluck('event_id');
        $myEvents = Events::find($myEventsIds);
        return view('admin.event.index', compact('events', 'myEvents'));
    }
}
