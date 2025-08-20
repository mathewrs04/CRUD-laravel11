<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */

    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'FIRSTNAME',
        'LASTNAME',
        'GENDER',
        'ADDRESS',
        'DOB',
        'DEPT_ID',
        'STATUS',
    ];
    
    use HasFactory;

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'DEPT_ID','id');
    }
}
