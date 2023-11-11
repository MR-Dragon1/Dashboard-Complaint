<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Sites extends Model
{
    public $timestamps = false;
    use HasFactory, LogsActivity;

    protected $table = 'sitelists';

    protected $fillable = [
        'name_sites',
        'groups'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name_sites','groups']);
    }
}