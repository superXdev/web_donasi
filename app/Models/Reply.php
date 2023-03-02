<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'contact_id'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
