<?php

namespace App\Http\Controllers\Api;

use App\Models\Events;
use App\Models\EventsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Event\BaseController;

class UnfollowController extends BaseController
{
    public function __invoke(Request $request)
    {
        $user = auth()->user()->id;
        $event = $request['event_id'];
        $events = Events::all();

        $whereArray = ['user_id' => $user, 'event_id' => $event];
        $query = DB::table('events_users');
        $currentEvent = $query->where($whereArray)->get();
        if ($currentEvent->isEmpty()) {
            return ['errors' => 'Вы не являетесь участником данного события'];
        } else {
            $query->delete();
            $myEventsIds = EventsUsers::where('user_id', '=', auth()->user()->id)->get()->pluck('event_id');
            $myEvents = Events::find($myEventsIds);
            return ['message' => 'Вы отказались от участия в событии', 'Все события' => $events, 'Мои события' => $myEvents];
        }
    }
}
