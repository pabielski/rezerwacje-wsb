<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
const CREATED_AT = 'created_at';
const UPDATED_AT = 'updated_at';
protected $table = 'reviews';
protected $primaryKey = 'id';
  public function reservation()
    {
        return $this->belongsTo(Reservation::class, "reservation_id");
    }
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
