<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'message',
        'name',
        'email',
        'phone',
        'status'
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
