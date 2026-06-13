<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $table = 'rooms';
    protected $primaryKey = 'id';

    public function amenityRooms()
    {
        return $this->hasMany(AmenityRoom::class,"room_id");
    }
}
