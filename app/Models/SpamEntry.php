<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpamEntry extends Model
{
    use HasFactory;

    protected $table = 'spam';

    protected $fillable = [
        'id',
        'ip_address',
        'email',
        'site',
        'complaints',
        'expectation',
        'created_at',
        'updated_at',
    ];

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        return $carbonDate->format('d / m / Y  -  H:i:s' );
    }
}