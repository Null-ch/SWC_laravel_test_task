<?php

namespace App\Service;

use Exception;
use App\Models\Events;
use Illuminate\Support\Facades\DB;

class EventService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            Events::firstOrCreate($data);
            DB::commit();
        } catch (Exception $exeption) {
            DB::rollBack();
            abort(500);
        }
    }
    public function update($data, $event)
    {
        try {
            DB::beginTransaction();
            $event->update($data);
            DB::commit();
        } catch (Exception $exeption) {
            DB::rollBack();
            abort(500);
        }

        return $event;
    }
}
