<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'age',
        'phone',
        'email',
        'address',
        'position',
        'department_id', 
        
    ];

  
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function payrolls()
{
    return $this->hasMany(Payroll::class);
}

}
