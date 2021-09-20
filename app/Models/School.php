<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country',
        'region',
        'contact_name',
        'contact_email',
        'contact_phone'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
