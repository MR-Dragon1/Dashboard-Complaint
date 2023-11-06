<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mails extends Model
{
    use HasFactory;

    protected $table = 'complaint_lists';

    protected $fillable = [
        'id',
        'complaints',
        'email',
        'complaints_image',
        'status',
        'site',
        'page',
        'created_at'
    ];

    public function comments()
{
    return $this->hasMany(Comments::class);
}
    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        return $carbonDate->format('l, d / m / Y');
    }



}