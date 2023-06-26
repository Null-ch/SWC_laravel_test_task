<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $guarded = false;
    public function follows()
    {
        return $this->belongsToMany(self::class, 'events_users', 'event_id', 'user_id');
    }
    

    public function followers() 
    {
        return $this->belongsToMany(self::class, 'events_users', 'user_id', 'id');
    }
}
