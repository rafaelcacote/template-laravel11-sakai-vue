<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
