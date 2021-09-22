<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'company_type',
        'description',
        'teacher_id'


    ];


    public function teacher()
    {
        return $this->hasOne(UsersTeacher::class);
    }
    public function student()
    {
        return $this->hasMany(UsersStudent::class);
    }
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
