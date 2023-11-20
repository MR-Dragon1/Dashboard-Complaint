<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class UpdateAnnouns extends Model
{
    use HasFactory;

    protected $table = 'update_announs';

    protected $fillable = [
        'id',
        'status',
        'message',
        'announs_id',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['title','description','announs_id']);
    }

        public function announs()
    {
        return $this->belongsTo(Announs::class);
    }
}