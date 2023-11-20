<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class ComplaintImage extends Model
{
    use HasFactory;

    protected $table = 'complaints_image';

    protected $fillable = [
        'id',
        'image',
        'mails_id',
        'created_at',
        'updated_at',
    ];

    public function complaints()
    {
        return $this->belongsTo(Mails::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['image','mails_id']);
    }
}