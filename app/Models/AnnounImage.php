<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class AnnounImage extends Model
{
    use HasFactory;
    protected $table = 'announs_image';

    protected $fillable = [
        'id',
        'image',
        'announs_id',
        'created_at',
        'updated_at',
    ];

    public function announs()
    {
        return $this->belongsTo(Announs::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['image','announs_id']);
    }
}