<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'thumbnail',
        'body',
        'goals',
        'raised',
        'deadline'
    ];

    public function getDeadlineAttribute($value)
    {
        $days = Carbon::create($value)->diffInDays();
        $months = Carbon::create($value)->diffInMonths()." bulan lagi";
        $hours = Carbon::create($value)->diffInHours()." jam lagi";

        if($days <= 30) return $days." hari lagi";
        if($days < 1) return $hours;

        return $months;
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
