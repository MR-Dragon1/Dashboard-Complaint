<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announs extends Model
{
    use HasFactory;
    protected $table = 'announcements';

    protected $fillable = [
        'id',
        'email',
        'announcement_image',
        'title',
        'description',
        'created_at'
    ];

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        return $carbonDate->format('l, d / m / Y  -  H:i:s');
    }
}