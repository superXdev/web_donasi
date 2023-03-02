<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'payment_method',
        'amount',
        'phone',
        'status',
        'campaign_id',
        'payment_id'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
