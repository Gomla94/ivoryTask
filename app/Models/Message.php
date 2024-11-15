<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function from()
    {
        return $this->belongsTo(User::class, 'message_from');
    }

    public function to()
    {
        return $this->belongsTo(User::class, 'message_to');
    }
}
