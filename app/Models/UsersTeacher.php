<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersTeacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_registration_number',
        'teacher_role',
        'teacher_role_other',
        'teacher_country',
        'teacher_phone',
        'school_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
