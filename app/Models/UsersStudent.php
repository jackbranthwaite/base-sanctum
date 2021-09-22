<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'nsn',
        'gender',
        'phone',
        'ethnicity_other'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function classes()
    {
        return $this->hasOne(ClassModel::class);
    }
    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
