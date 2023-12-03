<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class SpamEntry extends Model
{
    use HasFactory;

    protected $table = 'spam';

    protected $fillable = [
        'id',
        'ip_address',
        'email',
        'complaints',
        'site',
        'name',
        'code',
        'status',
        'ticket',
        'expectation',
        'created_at',
        'updated_at',
    ];


    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults()
        ->logOnly(['email','complaints' ,'ticket', 'status', 'site' ]);
    }

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        return $carbonDate->format('d / m / Y  -  H:i' );
    }



}
