<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockedIP extends Model
{
    use HasFactory;
    protected $table = 'blocked_ips';

    protected $fillable = [
        'id',
        'ip_address',
        'spam_count',
        'created_at',
        'updated_at',
    ];

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        return $carbonDate->format('d / m / Y  -  H:i:s' );
    }

}