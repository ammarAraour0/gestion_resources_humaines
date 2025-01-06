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
public function diplomas()
{
    return $this->hasMany(Diploma::class);
}

public function employee()
{
    return $this->belongsTo(Employee::class);
}
public function leaveRequests()
{
    return $this->hasMany(LeaveRequest::class);
}


}
