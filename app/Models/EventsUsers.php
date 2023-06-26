<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsUsers extends Model
{
    use HasFactory;

    protected $table = 'events_users';
    protected $guarded = false;

    protected $fillable = [
        'user_id',
        'event_id',
    ];
}
