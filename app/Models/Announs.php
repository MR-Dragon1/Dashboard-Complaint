<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Announs extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'announcements';

    protected $fillable = [
        'id',
        'email',
        'announcement_image',
        'title',
        'description',
        'created_at'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['email','announcement_image' ,'title', 'description']);
    }

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        return $carbonDate->format('d / m / Y  -  H:i');
    }

    public function imagesAnnouns()
    {
    return $this->hasMany(AnnounImage::class);
    }

    public function updatesAnnouns()
    {
    return $this->hasMany(UpdateAnnouns::class);
    }
}