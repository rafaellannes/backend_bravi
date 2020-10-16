<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'phone', 'email', 'whatsapp', 'user_id'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
