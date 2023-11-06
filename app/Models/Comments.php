<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'id',
        'email',
        'message',
        'person',
        'mails_id',
    ];

        public function complaints()
    {
        return $this->belongsTo(Mails::class);
    }
}