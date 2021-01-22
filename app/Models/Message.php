<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model};

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['content'];
}
