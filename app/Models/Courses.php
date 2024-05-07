<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    public function enroll()
    {
        return $this->hasMany(Enrollment::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }

}
