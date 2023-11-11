<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;
    protected $table = 'activity_log';

    protected $fillable = [
        'log_name',
        'description',
        'causer_id',
        'subject_id',
    ];
}