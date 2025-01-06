<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function leaves()
{
    return $this->hasMany(Leave::class);
}
public function attendances()
{
    return $this->hasMany(Attendance::class);
}

}
