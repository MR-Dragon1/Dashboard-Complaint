<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    protected $table = 'activity_log';

    protected $fillable = [
        'id',
        'log_name',
        'description',
        'subject_type ',
        'subject_id ',
        'causer_id',
        'properties',
        'updated_at ',
    ];

    public function getUpdatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        return $carbonDate->format('d / m / Y  -  H:i:s' );
    }
}