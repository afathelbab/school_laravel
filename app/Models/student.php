<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'code';
    public $incrementing = 'false';
    protected $fillable = ['name','email','phone','department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','department_id');
    }
    
}
