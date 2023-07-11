<?php

namespace App\Http\Controllers\Api;

use App\Models\Events;
use App\Models\EventsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Event\BaseController;

class FollowController extends BaseController
{
    public function __invoke(Request $request)
    {
        $user = auth()->user()->id;
        $event = $request['event_id'];
        $events = Events::all();
        $query = Events::find($event);
        $errors = '';
        $message = '';

        if (!$query) {
            $errors = 'События не существует';
        } else {
            $whereArray = ['user_id' => $user, 'event_id' => $event];
            $query = DB::table('events_users');
            $currentEvent = $query->where($whereArray)->get();
            if ($currentEvent->isEmpty()) {
                EventsUsers::firstOrCreate([
                    'user_id' => $user,
                    'event_id' => $request['event_id'],
                ]);
                $message = 'Вы стали участником события!';
            } else {
                $errors = 'Вы уже являетесь участником события!';
            }
        }
        
        $myEventsIds = EventsUsers::where('user_id', '=', auth()->user()->id)->get()->pluck('event_id');
        $myEvents = Events::find($myEventsIds);
        return ['errors' => $errors, $message, 'Все события' => $events, 'Мои события' => $myEvents];
    }
}
