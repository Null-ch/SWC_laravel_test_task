<?php

namespace App\Http\Controllers\Api;


use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Event\BaseController;

class DeleteController extends BaseController
{
    public function __invoke(Request $request)
    {
        $event = Events::find($request);
        $user = auth()->user()->id;

        if ($event->isEmpty()) {
            return ['errors' => 'События не существует, удаление невозможно!'];
        } elseif ($event[0]->creator_id != $user) {
            return ['errors' => 'Вы не являетесь создателем данного события, удаление невозможно!'];
        } else {
            $event[0]->delete();
            return ['errors' => null, 'message' => 'Событие успешно удалено!'];
        }
    }
}
