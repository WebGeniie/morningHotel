<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'size',
        'thumbnail',
        'status',
        'capacity'
    ];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_room');
    }
}
