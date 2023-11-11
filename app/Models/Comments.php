<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Comments extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'comments';

    protected $fillable = [
        'id',
        'message',
        'person',
        'roles',
        'mails_id',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['email','message','person','roles']);
    }

        public function complaints()
    {
        return $this->belongsTo(Mails::class);
    }
}