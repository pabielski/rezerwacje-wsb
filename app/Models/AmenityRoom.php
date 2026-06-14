<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmenityRoom extends Model
{
        protected $table = 'amenity_room';
    protected $primaryKey = 'id';

    public function amenity()
    {
        return $this->belongsTo(Amenity::class, "amenity_id");
    }
      public function room()
    {
        return $this->belongsTo(Room::class, "room_id");
    }
}
