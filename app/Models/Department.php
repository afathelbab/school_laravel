<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $primaryKey = 'department_id';

    public function students()
    {
        return $this->hasMany(student::class, 'department_id', 'department_id');
    }
    
}
