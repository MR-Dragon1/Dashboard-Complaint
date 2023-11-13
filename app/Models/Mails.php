<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Mails extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'complaint_lists';


    protected $fillable = [
        'id',
        'complaints',
        'email',
        'complaints_image',
        'status',
        'site',
        'page',
        'created_at',
        'updated_at'
    ];

    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults()
        ->logOnly(['email','complaints' ,'complaints_image', 'status', 'site' ]);
    }


    public function comments()
    {
    return $this->hasMany(Comments::class);
    }


    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        return $carbonDate->format('d / m / Y  -  H:i' );
    }
    public function getUpdatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        return $carbonDate->format('d / m / Y  -  H:i' );
    }



}