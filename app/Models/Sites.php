<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'sitelists';

    protected $fillable = [
        'name_sites',
        'groups'
    ];
}
