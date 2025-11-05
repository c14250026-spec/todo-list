<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // Izinkan field name dan description untuk mass assignment (create)
    protected $fillable = ['name', 'description'];
}
